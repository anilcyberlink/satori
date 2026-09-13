{{--
    This partial is @include()'d inside the single #tripData form on the
    parent "create trip" page (which already has its own @csrf and its own
    AJAX submit handler using FormData on the WHOLE form). So this file must
    NOT contain its own <form>, @csrf, or submit button — it just contributes
    inputs to that outer form.

    Assumptions (adjust to match your actual models/controller):
    - $trip                          : the Trip model being edited (null when creating)
    - $trip->fullBoardService        : ->price_1, ->price_2, ->description
    - $trip->baseCampService         : ->price_1, ->price_2, ->description
    - $trip->packageDetails          : Collection of rows with:
                                          ->service ('full_board' | 'base_camp')
                                          ->type    ('include' | 'exclude')
                                          ->title
                                          ->details (array of strings)

    Price Includes / Excludes are now scoped PER SERVICE TAB (Full Board has
    its own includes/excludes, Base Camp has its own), sharing one generic
    add/remove widget driven by data-service / data-type attributes rather
    than duplicating the JS per tab.

    All classes/IDs are prefixed with "pkg-" so they can't collide with the
    itinerary/gear/FAQ/etc. add-row patterns already used elsewhere on this
    same page.
--}}

@php
    $pkgServices = [
        'full_board' => ['label' => 'Full Board Service', 'icon' => 'glyphicon-home', 'relation' => 'fullBoardService'],
        'base_camp'  => ['label' => 'Base Camp Service',   'icon' => 'glyphicon-tent', 'relation' => 'baseCampService'],
    ];

    $pkgDetailTypes = [
        'include' => ['label' => 'PRICE INCLUDES', 'heading_icon' => 'glyphicon-ok-sign text-success', 'row_icon' => 'glyphicon-ok'],
        'exclude' => ['label' => 'PRICE EXCLUDES', 'heading_icon' => 'glyphicon-remove-sign text-danger', 'row_icon' => 'glyphicon-remove'],
    ];

    // Build $existingDetails[service][type] = Collection|array of {title, details[]}
    $existingDetails = [];

    foreach ($pkgServices as $serviceKey => $serviceMeta) {
        foreach ($pkgDetailTypes as $typeKey => $typeMeta) {
            $old = old("package_details.$serviceKey.$typeKey");

            $existingDetails[$serviceKey][$typeKey] = $old
                ?? (isset($trip)
                    ? $trip->packageDetails->where('service', $serviceKey)->where('type', $typeKey)->values()
                    : collect());
        }
    }
@endphp

<div class="col-md-12">
    <div class="panel pkg-panel">

        <div class="panel-heading">
            <span class="panel-title">PACKAGE OPTIONS &amp; DETAILS</span>
        </div>

        <div class="panel-body">

            {{-- ========================================================= --}}
            {{-- PACKAGE SERVICE TABS                                      --}}
            {{-- ========================================================= --}}

            <div class="pkg-service-tabs">

                <ul class="nav nav-tabs" role="tablist">
                    @foreach($pkgServices as $serviceKey => $serviceMeta)
                        <li role="presentation" class="{{ $loop->first ? 'active' : '' }}">
                            <a href="#pkg-{{ $serviceKey }}-service"
                               aria-controls="pkg-{{ $serviceKey }}-service"
                               role="tab"
                               data-toggle="tab">
                                <i class="glyphicon {{ $serviceMeta['icon'] }}"></i>
                                {{ $serviceMeta['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content pkg-tab-content">

                    @foreach($pkgServices as $serviceKey => $serviceMeta)

                        @php
                            $serviceModel = $trip->{$serviceMeta['relation']} ?? null;
                        @endphp

                        <div role="tabpanel"
                             class="tab-pane {{ $loop->first ? 'active' : '' }}"
                             id="pkg-{{ $serviceKey }}-service">

                            {{-- --------------------------------------------------- --}}
                            {{-- PRICES + DESCRIPTION                                --}}
                            {{-- --------------------------------------------------- --}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group @error("package_service.$serviceKey.price_1") has-error @enderror">
                                        <label>Price 1</label>

                                        <input type="number"
                                               step="0.01"
                                               min="0"
                                               name="package_service[{{ $serviceKey }}][price_1]"
                                               class="form-control"
                                               placeholder="Enter price"
                                               value="{{ old("package_service.$serviceKey.price_1", $serviceModel->price_1 ?? '') }}">

                                        @error("package_service.$serviceKey.price_1")
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group @error("package_service.$serviceKey.price_2") has-error @enderror">
                                        <label>Price 2</label>

                                        <input type="number"
                                               step="0.01"
                                               min="0"
                                               name="package_service[{{ $serviceKey }}][price_2]"
                                               class="form-control"
                                               placeholder="Enter price"
                                               value="{{ old("package_service.$serviceKey.price_2", $serviceModel->price_2 ?? '') }}">

                                        @error("package_service.$serviceKey.price_2")
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group @error("package_service.$serviceKey.description") has-error @enderror">
                                        <label>Description</label>

                                        <textarea name="package_service[{{ $serviceKey }}][description]"
                                                  class="form-control"
                                                  rows="4"
                                                  placeholder="Describe the {{ $serviceMeta['label'] }}">{{ old("package_service.$serviceKey.description", $serviceModel->description ?? '') }}</textarea>

                                        @error("package_service.$serviceKey.description")
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <hr class="pkg-divider">


                            {{-- --------------------------------------------------- --}}
                            {{-- PRICE INCLUDES / EXCLUDES (scoped to this service)  --}}
                            {{-- --------------------------------------------------- --}}

                            <h4 class="pkg-details-title">{{ $serviceMeta['label'] }} — Package Details</h4>

                            <p class="text-muted">
                                Add the services and items included or excluded from
                                the {{ $serviceMeta['label'] }} option.
                            </p>

                            @foreach($pkgDetailTypes as $typeKey => $typeMeta)

                                @php
                                    $existingItems = $existingDetails[$serviceKey][$typeKey];
                                @endphp

                                <div class=" panel-default pkg-group pkg-group-{{ $typeKey }}">

                                    <div class="panel-heading">

                                        <strong>
                                            <i class="glyphicon {{ $typeMeta['heading_icon'] }}"></i>
                                            {{ $typeMeta['label'] }}
                                        </strong>

                                        <button type="button"
                                                class="btn btn-primary btn-sm pull-right pkg-add-section"
                                                id="pkg-add-{{ $serviceKey }}-{{ $typeKey }}-section"
                                                data-service="{{ $serviceKey }}"
                                                data-type="{{ $typeKey }}">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            Add Section
                                        </button>

                                        <div class="clearfix"></div>

                                    </div>

                                    <div class="panel-body">

                                        <div id="pkg-{{ $serviceKey }}-{{ $typeKey }}-sections" class="pkg-sections">
                                            @foreach($existingItems as $sectionIndex => $section)
                                                <div class="pkg-detail-section"
                                                     data-section-service="{{ $serviceKey }}"
                                                     data-section-type="{{ $typeKey }}"
                                                     data-section-index="{{ $sectionIndex }}">

                                                    <div class="pkg-section-header">
                                                        <span class="pkg-section-badge pkg-section-badge-{{ $typeKey }}">{{ $sectionIndex + 1 }}</span>

                                                        <div class="pkg-section-title-wrap">
                                                            <label>Section Title</label>
                                                            <input type="text"
                                                                   class="form-control pkg-section-title-input"
                                                                   placeholder="e.g. ACCOMMODATION & TRANSFERS"
                                                                   name="package_details[{{ $serviceKey }}][{{ $typeKey }}][{{ $sectionIndex }}][title]"
                                                                   value="{{ is_array($section) ? ($section['title'] ?? '') : $section->title }}">
                                                        </div>

                                                        <button type="button" class="btn btn-danger btn-sm pkg-remove-section" title="Remove section">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </button>
                                                    </div>

                                                    <div class="pkg-section-details">
                                                        @php
                                                            $sectionDetails = is_array($section) ? ($section['details'] ?? []) : $section->details;
                                                        @endphp

                                                        @foreach($sectionDetails as $detailIndex => $detailValue)
                                                            <div class="pkg-detail-row">
                                                                <span class="pkg-detail-icon pkg-detail-icon-{{ $typeKey }}">
                                                                    <i class="glyphicon {{ $typeMeta['row_icon'] }}"></i>
                                                                </span>
                                                                <input type="text"
                                                                       class="form-control pkg-detail-input"
                                                                       placeholder="Enter detail"
                                                                       name="package_details[{{ $serviceKey }}][{{ $typeKey }}][{{ $sectionIndex }}][details][{{ $detailIndex }}]"
                                                                       value="{{ $detailValue }}">
                                                                <button type="button" class="btn btn-danger btn-sm pkg-remove-detail" title="Remove detail">
                                                                    <i class="glyphicon glyphicon-trash"></i>
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <button type="button" class="btn btn-default btn-sm pkg-add-detail">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        Add Detail
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div id="pkg-{{ $serviceKey }}-{{ $typeKey }}-empty"
                                             class="pkg-empty-state"
                                             style="{{ count($existingItems) ? 'display:none;' : '' }}">
                                            <i class="glyphicon glyphicon-inbox"></i>
                                            No {{ $typeKey }} section added yet.
                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>
</div>


{{-- ================================================================ --}}
{{-- TEMPLATES (generic — reused for ANY service, new sections/details --}}
{{-- created via JS pick the right one based on data-type)             --}}
{{-- ================================================================ --}}

<div style="display:none;">

    {{-- INCLUDE SECTION TEMPLATE --}}
    <div id="pkg-include-section-template">
        <div class="pkg-detail-section">
            <div class="pkg-section-header">
                <span class="pkg-section-badge pkg-section-badge-include"></span>
                <div class="pkg-section-title-wrap">
                    <label>Section Title</label>
                    <input type="text"
                           class="form-control pkg-section-title-input"
                           placeholder="e.g. ACCOMMODATION & TRANSFERS">
                </div>
                <button type="button" class="btn btn-danger btn-sm pkg-remove-section" title="Remove section">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </div>
            <div class="pkg-section-details"></div>
            <button type="button" class="btn btn-default btn-sm pkg-add-detail">
                <i class="glyphicon glyphicon-plus"></i>
                Add Detail
            </button>
        </div>
    </div>

    {{-- EXCLUDE SECTION TEMPLATE --}}
    <div id="pkg-exclude-section-template">
        <div class="pkg-detail-section">
            <div class="pkg-section-header">
                <span class="pkg-section-badge pkg-section-badge-exclude"></span>
                <div class="pkg-section-title-wrap">
                    <label>Section Title</label>
                    <input type="text"
                           class="form-control pkg-section-title-input"
                           placeholder="e.g. ACCOMMODATION & TRANSFERS">
                </div>
                <button type="button" class="btn btn-danger btn-sm pkg-remove-section" title="Remove section">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </div>
            <div class="pkg-section-details"></div>
            <button type="button" class="btn btn-default btn-sm pkg-add-detail">
                <i class="glyphicon glyphicon-plus"></i>
                Add Detail
            </button>
        </div>
    </div>

    {{-- INCLUDE DETAIL ROW TEMPLATE --}}
    <div id="pkg-include-detail-row-template">
        <div class="pkg-detail-row">
            <span class="pkg-detail-icon pkg-detail-icon-include">
                <i class="glyphicon glyphicon-ok"></i>
            </span>
            <input type="text" class="form-control pkg-detail-input" placeholder="Enter detail">
            <button type="button" class="btn btn-danger btn-sm pkg-remove-detail" title="Remove detail">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </div>
    </div>

    {{-- EXCLUDE DETAIL ROW TEMPLATE --}}
    <div id="pkg-exclude-detail-row-template">
        <div class="pkg-detail-row">
            <span class="pkg-detail-icon pkg-detail-icon-exclude">
                <i class="glyphicon glyphicon-remove"></i>
            </span>
            <input type="text" class="form-control pkg-detail-input" placeholder="Enter detail">
            <button type="button" class="btn btn-danger btn-sm pkg-remove-detail" title="Remove detail">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </div>
    </div>

</div>


{{-- ================================================================ --}}
{{-- STYLES                                                            --}}
{{-- ================================================================ --}}

<style>
    .pkg-service-tabs .nav-tabs > li > a {
        font-weight: 600;
        padding: 12px 22px;
        border-radius: 4px 4px 0 0;
        transition: all .15s ease-in-out;
    }

    .pkg-service-tabs .nav-tabs > li.active > a,
    .pkg-service-tabs .nav-tabs > li.active > a:focus,
    .pkg-service-tabs .nav-tabs > li.active > a:hover {
        background: #337ab7;
        color: #fff;
        border-color: #337ab7;
    }

    .pkg-tab-content {
        padding: 22px;
        border: 1px solid #ddd;
        border-top: none;
        background: #fff;
        border-radius: 0 0 4px 4px;
    }

    .pkg-divider {
        margin: 26px 0;
        border-top: 1px solid #e5e5e5;
    }

    .pkg-details-title {
        margin-top: 0;
        font-weight: 700;
    }

    .pkg-group {
        border-radius: 4px;
        overflow: hidden;
    }

    .pkg-group .panel-heading {
        background: #f7f9fa;
    }

    .pkg-sections {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .pkg-detail-section {
        padding: 16px 18px;
        border: 1px solid #e2e5e8;
        border-left: 4px solid #5cb85c;
        border-radius: 4px;
        background: #fbfbfb;
        transition: box-shadow .15s ease-in-out;
    }

    .pkg-group-exclude .pkg-detail-section {
        border-left-color: #d9534f;
    }

    .pkg-detail-section:hover {
        box-shadow: 0 1px 6px rgba(0, 0, 0, .08);
    }

    .pkg-section-header {
        display: flex;
        align-items: flex-end;
        gap: 12px;
        margin-bottom: 14px;
    }

    .pkg-section-badge {
        flex: 0 0 auto;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #5cb85c;
        color: #fff;
        font-weight: 700;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
    }

    .pkg-section-badge-exclude {
        background: #d9534f;
    }

    .pkg-section-title-wrap {
        flex: 1 1 auto;
    }

    .pkg-section-title-wrap label {
        font-size: 12px;
        font-weight: 600;
        color: #777;
        margin-bottom: 2px;
    }

    .pkg-section-title-input {
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: .3px;
    }

    .pkg-remove-section {
        flex: 0 0 auto;
        margin-bottom: 1px;
    }

    .pkg-section-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 12px;
    }

    .pkg-detail-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pkg-detail-icon {
        flex: 0 0 auto;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        background: #eef7ee;
        color: #3c763d;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pkg-detail-icon-exclude {
        background: #fbeceb;
        color: #a94442;
    }

    .pkg-detail-input {
        flex: 1 1 auto;
    }

    .pkg-remove-detail {
        flex: 0 0 auto;
    }

    .pkg-empty-state {
        text-align: center;
        color: #999;
        padding: 26px;
        border: 1px dashed #ddd;
        border-radius: 4px;
        background: #fcfcfc;
    }

    .pkg-empty-state .glyphicon {
        display: block;
        font-size: 20px;
        margin-bottom: 6px;
        color: #ccc;
    }
</style>


{{-- ================================================================ --}}
{{-- JAVASCRIPT                                                        --}}
{{-- ================================================================ --}}

{{--
    Wrapped in DOMContentLoaded: this partial renders inline inside
    @section('content'), which in this layout appears BEFORE the footer
    <script src="jquery...">. DOMContentLoaded only fires once every script
    on the page — including that footer one — has already run, so jQuery is
    guaranteed to exist by the time this callback fires.

    One generic widget handles ALL FOUR groups (Full Board includes/excludes,
    Base Camp includes/excludes): every "Add Section" button carries
    data-service and data-type attributes, and every section element carries
    matching data-section-service / data-section-type attributes, so the
    same click handlers work no matter which tab/group they came from.
--}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof jQuery === 'undefined') {
        console.error('Package details widget: jQuery was not found on the page.');
        return;
    }

    (function ($) {

        // sectionCounters[service][type] starts AFTER any server-rendered
        // sections for that service+type combo, so newly-added sections get
        // fresh indices instead of colliding with (and overwriting)
        // existing saved data on edit.
        let sectionCounters = {
            full_board: {
                include: {{ count($existingDetails['full_board']['include']) }},
                exclude: {{ count($existingDetails['full_board']['exclude']) }}
            },
            base_camp: {
                include: {{ count($existingDetails['base_camp']['include']) }},
                exclude: {{ count($existingDetails['base_camp']['exclude']) }}
            }
        };

        function createDetailRow(service, type, sectionIndex, detailIndex) {
            let templateId = type === 'include'
                ? '#pkg-include-detail-row-template'
                : '#pkg-exclude-detail-row-template';

            let row = $(templateId).children().first().clone();

            let inputName =
                'package_details[' + service + '][' + type + '][' + sectionIndex + '][details][' + detailIndex + ']';

            row.find('.pkg-detail-input').attr('name', inputName);

            return row;
        }

        function createSection(service, type, sectionIndex) {
            let templateId = type === 'include'
                ? '#pkg-include-section-template'
                : '#pkg-exclude-section-template';

            let section = $(templateId).children().first().clone();

            let titleName = 'package_details[' + service + '][' + type + '][' + sectionIndex + '][title]';
            section.find('.pkg-section-title-input').attr('name', titleName);
            section.find('.pkg-section-badge').text(sectionIndex + 1);

            section.attr('data-section-service', service);
            section.attr('data-section-type', type);
            section.attr('data-section-index', sectionIndex);

            section.find('.pkg-section-details')
                .append(createDetailRow(service, type, sectionIndex, 0));

            section.data('detail-index', 1);

            return section;
        }

        $(document).on('click', '.pkg-add-section', function () {
            let service = $(this).data('service');
            let type = $(this).data('type');
            let sectionIndex = sectionCounters[service][type];

            let section = createSection(service, type, sectionIndex);
            $('#pkg-' + service + '-' + type + '-sections').append(section);

            sectionCounters[service][type]++;
            $('#pkg-' + service + '-' + type + '-empty').hide();
        });

        // Works for server-rendered AND JS-created sections alike, since
        // server-rendered sections carry the same data-section-service /
        // data-section-type / data-section-index attributes.
        $(document).on('click', '.pkg-add-detail', function () {
            let section = $(this).closest('.pkg-detail-section');
            let service = section.attr('data-section-service');
            let type = section.attr('data-section-type');
            let sectionIndex = section.attr('data-section-index');

            // Fall back to the actual number of existing detail rows the
            // first time this runs on a server-rendered section, since
            // those don't have a 'detail-index' data value set yet.
            let detailIndex = section.data('detail-index');
            if (typeof detailIndex === 'undefined') {
                detailIndex = section.find('.pkg-detail-row').length;
            }

            let detail = createDetailRow(service, type, sectionIndex, detailIndex);
            section.find('.pkg-section-details').append(detail);
            section.data('detail-index', detailIndex + 1);
        });

        $(document).on('click', '.pkg-remove-detail', function () {
            let section = $(this).closest('.pkg-detail-section');
            let detailRows = section.find('.pkg-detail-row');

            if (detailRows.length <= 1) {
                alert('At least one detail is required.');
                return;
            }

            $(this).closest('.pkg-detail-row').remove();
        });

        $(document).on('click', '.pkg-remove-section', function () {
            let section = $(this).closest('.pkg-detail-section');
            let service = section.attr('data-section-service');
            let type = section.attr('data-section-type');

            if (!confirm('Are you sure you want to remove this section?')) {
                return;
            }

            section.remove();

            if ($('#pkg-' + service + '-' + type + '-sections .pkg-detail-section').length === 0) {
                $('#pkg-' + service + '-' + type + '-empty').show();
            }
        });

    })(jQuery);

});
</script>
