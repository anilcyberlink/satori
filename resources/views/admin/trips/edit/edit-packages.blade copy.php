@php

    /*
    |--------------------------------------------------------------------------
    | PACKAGE SERVICES
    |--------------------------------------------------------------------------
    */

    $pkgServices = [
        'full_board' => [
            'label' => 'Full Board Service',
            'icon' => 'glyphicon-home',
            'relation' => 'fullBoardService',
        ],

        'base_camp' => [
            'label' => 'Base Camp Service',
            'icon' => 'glyphicon-tent',
            'relation' => 'baseCampService',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | PACKAGE DETAIL TYPES
    |--------------------------------------------------------------------------
    */

    $pkgDetailTypes = [
        'include' => [
            'label' => 'PRICE INCLUDES',
            'heading_icon' => 'glyphicon-ok-sign text-success',
            'row_icon' => 'glyphicon-ok',
        ],

        'exclude' => [
            'label' => 'PRICE EXCLUDES',
            'heading_icon' => 'glyphicon-remove-sign text-danger',
            'row_icon' => 'glyphicon-remove',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | EXISTING PACKAGE DETAILS
    |--------------------------------------------------------------------------
    |
    | Structure:
    |
    | $existingDetails[
    |     service
    | ][
    |     type
    | ]
    |
    */

    $existingDetails = [];

    foreach ($pkgServices as $serviceKey => $serviceMeta) {
        foreach ($pkgDetailTypes as $typeKey => $typeMeta) {
            $old = old("package_details.$serviceKey.$typeKey");

            $existingDetails[$serviceKey][$typeKey] =
                $old ??
                (isset($trip)
                    ? $trip->packageDetails
                        ->where('service', $serviceKey)
                        ->where('type', $typeKey)
                        ->sortBy('sort_order')
                        ->values()
                    : collect());
        }
    }

@endphp


{{-- ================================================================ --}}
{{-- PACKAGE OPTIONS & DETAILS                                       --}}
{{-- ================================================================ --}}

<div class="col-md-12">

    <div class="panel pkg-panel">

        <div class="panel-heading">

            <span class="panel-title">
                PACKAGE OPTIONS &amp; DETAILS
            </span>

        </div>


        <div class="panel-body">


            {{-- ======================================================== --}}
            {{-- SERVICE TABS                                             --}}
            {{-- ======================================================== --}}

            <div class="pkg-service-tabs">

                <ul class="nav nav-tabs" role="tablist">

                    @foreach ($pkgServices as $serviceKey => $serviceMeta)
                        <li role="presentation" class="{{ $loop->first ? 'active' : '' }}">

                            <a href="#pkg-{{ $serviceKey }}-service" aria-controls="pkg-{{ $serviceKey }}-service"
                                role="tab" data-toggle="tab">

                                <i class="glyphicon {{ $serviceMeta['icon'] }}"></i>

                                {{ $serviceMeta['label'] }}

                            </a>

                        </li>
                    @endforeach

                </ul>


                <div class="tab-content pkg-tab-content">


                    {{-- ================================================= --}}
                    {{-- EACH SERVICE                                      --}}
                    {{-- ================================================= --}}

                    @foreach ($pkgServices as $serviceKey => $serviceMeta)
                        @php

                            $serviceModel = isset($trip) ? $trip->{$serviceMeta['relation']} ?? null : null;

                        @endphp


                        <div role="tabpanel" class="tab-pane {{ $loop->first ? 'active' : '' }}"
                            id="pkg-{{ $serviceKey }}-service">


                            {{-- ========================================== --}}
                            {{-- PRICE + DESCRIPTION                       --}}
                            {{-- ========================================== --}}

                            <div class="row">


                                {{-- PRICE 1 --}}

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Price 1
                                        </label>

                                        <input type="number" step="0.01" min="0"
                                            name="package_service[{{ $serviceKey }}][price_1]" class="form-control"
                                            placeholder="Enter price"
                                            value="{{ old("package_service.$serviceKey.price_1", $serviceModel->price_1 ?? '') }}">

                                    </div>

                                </div>


                                {{-- PRICE 2 --}}

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Price 2
                                        </label>

                                        <input type="number" step="0.01" min="0"
                                            name="package_service[{{ $serviceKey }}][price_2]" class="form-control"
                                            placeholder="Enter price"
                                            value="{{ old("package_service.$serviceKey.price_2", $serviceModel->price_2 ?? '') }}">

                                    </div>

                                </div>


                                {{-- DESCRIPTION --}}

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>
                                            Description
                                        </label>

                                        <textarea name="package_service[{{ $serviceKey }}][description]" class="form-control" rows="4"
                                            placeholder="Describe the {{ $serviceMeta['label'] }}">{{ old("package_service.$serviceKey.description", $serviceModel->description ?? '') }}</textarea>

                                    </div>

                                </div>


                            </div>


                            <hr class="pkg-divider">


                            {{-- ========================================== --}}
                            {{-- PACKAGE DETAILS                            --}}
                            {{-- ========================================== --}}

                            <h4 class="pkg-details-title">

                                {{ $serviceMeta['label'] }} — Package Details

                            </h4>


                            <p class="text-muted">

                                Add the services and items included or excluded
                                from the {{ $serviceMeta['label'] }} option.

                            </p>


                            {{-- ========================================== --}}
                            {{-- INCLUDE / EXCLUDE                         --}}
                            {{-- ========================================== --}}

                            @foreach ($pkgDetailTypes as $typeKey => $typeMeta)
                                @php

                                    $existingItems = $existingDetails[$serviceKey][$typeKey];

                                @endphp


                                <div class="panel panel-default pkg-group pkg-group-{{ $typeKey }}">


                                    {{-- GROUP HEADER --}}

                                    <div class="panel-heading">

                                        <strong>

                                            <i class="glyphicon {{ $typeMeta['heading_icon'] }}"></i>

                                            {{ $typeMeta['label'] }}

                                        </strong>


                                        <button type="button" class="btn btn-primary btn-sm pull-right pkg-add-section"
                                            data-service="{{ $serviceKey }}" data-type="{{ $typeKey }}">

                                            <i class="glyphicon glyphicon-plus"></i>

                                            Add Section

                                        </button>


                                        <div class="clearfix"></div>

                                    </div>


                                    {{-- GROUP BODY --}}

                                    <div class="panel-body">


                                        <div id="pkg-{{ $serviceKey }}-{{ $typeKey }}-sections"
                                            class="pkg-sections">


                                            {{-- ================================= --}}
                                            {{-- EXISTING SECTIONS                 --}}
                                            {{-- ================================= --}}

                                            @foreach ($existingItems as $sectionIndex => $section)
                                                @php

                                                    if (is_array($section)) {
                                                        $sectionTitle = $section['title'] ?? '';

                                                        $sectionDetails = $section['details'] ?? [];
                                                    } else {
                                                        $sectionTitle = $section->title ?? '';

                                                        $sectionDetails = $section->details ?? [];
                                                    }

                                                    /*
                                                    |--------------------------------------------------------------------------
                                                    | Make sure details is an array
                                                    |--------------------------------------------------------------------------
                                                    */

                                                    if (is_string($sectionDetails)) {
                                                        $decodedDetails = json_decode($sectionDetails, true);

                                                        $sectionDetails = is_array($decodedDetails)
                                                            ? $decodedDetails
                                                            : [$sectionDetails];
                                                    }

                                                @endphp


                                                <div class="pkg-detail-section"
                                                    data-section-service="{{ $serviceKey }}"
                                                    data-section-type="{{ $typeKey }}"
                                                    data-section-index="{{ $sectionIndex }}">


                                                    {{-- SECTION HEADER --}}

                                                    <div class="pkg-section-header">


                                                        <span
                                                            class="pkg-section-badge pkg-section-badge-{{ $typeKey }}">
                                                            {{ $sectionIndex + 1 }}
                                                        </span>


                                                        <div class="pkg-section-title-wrap">

                                                            <label>
                                                                Section Title
                                                            </label>

                                                            <input type="text"
                                                                class="form-control pkg-section-title-input"
                                                                name="package_details[{{ $serviceKey }}][{{ $typeKey }}][{{ $sectionIndex }}][title]"
                                                                placeholder="e.g. ACCOMMODATION & TRANSFERS"
                                                                value="{{ $sectionTitle }}">

                                                        </div>


                                                        <button type="button"
                                                            class="btn btn-danger btn-sm pkg-remove-section"
                                                            title="Remove section">

                                                            <i class="glyphicon glyphicon-trash"></i>

                                                        </button>


                                                    </div>


                                                    {{-- SECTION DETAILS --}}

                                                    <div class="pkg-section-details">


                                                        @foreach ($sectionDetails as $detailIndex => $detailValue)
                                                            <div class="pkg-detail-row">


                                                                <span
                                                                    class="pkg-detail-icon pkg-detail-icon-{{ $typeKey }}">

                                                                    <i
                                                                        class="glyphicon {{ $typeMeta['row_icon'] }}"></i>

                                                                </span>


                                                                <input type="text"
                                                                    class="form-control pkg-detail-input"
                                                                    name="package_details[{{ $serviceKey }}][{{ $typeKey }}][{{ $sectionIndex }}][details][{{ $detailIndex }}]"
                                                                    placeholder="Enter detail"
                                                                    value="{{ $detailValue }}">


                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm pkg-remove-detail"
                                                                    title="Remove detail">

                                                                    <i class="glyphicon glyphicon-trash"></i>

                                                                </button>


                                                            </div>
                                                        @endforeach


                                                    </div>


                                                    {{-- ADD DETAIL --}}

                                                    <button type="button"
                                                        class="btn btn-default btn-sm pkg-add-detail">

                                                        <i class="glyphicon glyphicon-plus"></i>

                                                        Add Detail

                                                    </button>


                                                </div>
                                            @endforeach


                                        </div>


                                        {{-- EMPTY STATE --}}

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
{{-- JAVASCRIPT TEMPLATES                                             --}}
{{-- ================================================================ --}}

<div style="display:none;">


    {{-- INCLUDE SECTION TEMPLATE --}}

    <div id="pkg-include-section-template">

        <div class="pkg-detail-section">

            <div class="pkg-section-header">

                <span class="pkg-section-badge pkg-section-badge-include"></span>


                <div class="pkg-section-title-wrap">

                    <label>
                        Section Title
                    </label>

                    <input type="text" class="form-control pkg-section-title-input"
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

                    <label>
                        Section Title
                    </label>

                    <input type="text" class="form-control pkg-section-title-input"
                        placeholder="e.g. HIGH ALTITUDE SERVICES">

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


    {{-- INCLUDE DETAIL TEMPLATE --}}

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


    {{-- EXCLUDE DETAIL TEMPLATE --}}

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
    .pkg-service-tabs .nav-tabs>li>a {

        font-weight: 600;
        padding: 12px 22px;

        border-radius: 4px 4px 0 0;

        transition: all .15s ease-in-out;

    }


    .pkg-service-tabs .nav-tabs>li.active>a,
    .pkg-service-tabs .nav-tabs>li.active>a:focus,
    .pkg-service-tabs .nav-tabs>li.active>a:hover {

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

        margin-top: 20px;

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

    }


    .pkg-group-exclude .pkg-detail-section {

        border-left-color: #d9534f;

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

<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (typeof jQuery === 'undefined') {

            console.error(
                'Package details widget: jQuery was not found on the page.'
            );

            return;
        }


        (function($) {


            /*
            |--------------------------------------------------------------------------
            | SECTION COUNTERS
            |--------------------------------------------------------------------------
            |
            | Start after the sections already loaded from database.
            |
            */

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


            /*
            |--------------------------------------------------------------------------
            | CREATE DETAIL ROW
            |--------------------------------------------------------------------------
            */

            function createDetailRow(
                service,
                type,
                sectionIndex,
                detailIndex
            ) {

                let templateId =
                    type === 'include' ?
                    '#pkg-include-detail-row-template' :
                    '#pkg-exclude-detail-row-template';


                let row =
                    $(templateId)
                    .children()
                    .first()
                    .clone();


                let inputName =
                    'package_details[' +
                    service +
                    '][' +
                    type +
                    '][' +
                    sectionIndex +
                    '][details][' +
                    detailIndex +
                    ']';


                row.find('.pkg-detail-input')
                    .attr('name', inputName);


                return row;

            }


            /*
            |--------------------------------------------------------------------------
            | CREATE SECTION
            |--------------------------------------------------------------------------
            */

            function createSection(
                service,
                type,
                sectionIndex
            ) {

                let templateId =
                    type === 'include' ?
                    '#pkg-include-section-template' :
                    '#pkg-exclude-section-template';


                let section =
                    $(templateId)
                    .children()
                    .first()
                    .clone();


                /*
                | Title name
                */

                let titleName =
                    'package_details[' +
                    service +
                    '][' +
                    type +
                    '][' +
                    sectionIndex +
                    '][title]';


                section.find('.pkg-section-title-input')
                    .attr('name', titleName);


                /*
                | Section number
                */

                section.find('.pkg-section-badge')
                    .text(sectionIndex + 1);


                /*
                | Section metadata
                */

                section.attr(
                    'data-section-service',
                    service
                );

                section.attr(
                    'data-section-type',
                    type
                );

                section.attr(
                    'data-section-index',
                    sectionIndex
                );


                /*
                | Add first detail
                */

                section.find('.pkg-section-details')
                    .append(
                        createDetailRow(
                            service,
                            type,
                            sectionIndex,
                            0
                        )
                    );


                /*
                | Detail counter
                */

                section.data(
                    'detail-index',
                    1
                );


                return section;

            }


            /*
            |--------------------------------------------------------------------------
            | ADD SECTION
            |--------------------------------------------------------------------------
            */

            $(document).on(
                'click',
                '.pkg-add-section',
                function() {

                    let service =
                        $(this).data('service');

                    let type =
                        $(this).data('type');


                    let sectionIndex =
                        sectionCounters[service][type];


                    let section =
                        createSection(
                            service,
                            type,
                            sectionIndex
                        );


                    $('#pkg-' + service + '-' + type + '-sections')
                        .append(section);


                    sectionCounters[service][type]++;


                    $('#pkg-' + service + '-' + type + '-empty')
                        .hide();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | ADD DETAIL
            |--------------------------------------------------------------------------
            */

            $(document).on(
                'click',
                '.pkg-add-detail',
                function() {

                    let section =
                        $(this)
                        .closest('.pkg-detail-section');


                    let service =
                        section.attr(
                            'data-section-service'
                        );


                    let type =
                        section.attr(
                            'data-section-type'
                        );


                    let sectionIndex =
                        section.attr(
                            'data-section-index'
                        );


                    let detailIndex =
                        section.data('detail-index');


                    /*
                    | Existing database section
                    | doesn't have a counter yet.
                    */

                    if (
                        typeof detailIndex ===
                        'undefined'
                    ) {

                        detailIndex =
                            section
                            .find('.pkg-detail-row')
                            .length;

                    }


                    let detail =
                        createDetailRow(
                            service,
                            type,
                            sectionIndex,
                            detailIndex
                        );


                    section
                        .find('.pkg-section-details')
                        .append(detail);


                    section.data(
                        'detail-index',
                        detailIndex + 1
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | REMOVE DETAIL
            |--------------------------------------------------------------------------
            */

            $(document).on(
                'click',
                '.pkg-remove-detail',
                function() {

                    let section =
                        $(this)
                        .closest('.pkg-detail-section');


                    let detailRows =
                        section.find(
                            '.pkg-detail-row'
                        );


                    /*
                    | Allow deleting the last detail.
                    |
                    | If you want to force at least one,
                    | change this condition back.
                    */

                    if (detailRows.length <= 1) {

                        $(this)
                            .closest('.pkg-detail-row')
                            .remove();

                        return;

                    }


                    $(this)
                        .closest('.pkg-detail-row')
                        .remove();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | REMOVE SECTION
            |--------------------------------------------------------------------------
            */

            $(document).on(
                'click',
                '.pkg-remove-section',
                function() {

                    let section =
                        $(this)
                        .closest('.pkg-detail-section');


                    let service =
                        section.attr(
                            'data-section-service'
                        );


                    let type =
                        section.attr(
                            'data-section-type'
                        );


                    if (
                        !confirm(
                            'Are you sure you want to remove this section?'
                        )
                    ) {

                        return;

                    }


                    section.remove();


                    /*
                    | Show empty message.
                    */

                    if (
                        $('#pkg-' +
                            service +
                            '-' +
                            type +
                            '-sections .pkg-detail-section'
                        ).length === 0
                    ) {

                        $('#pkg-' +
                            service +
                            '-' +
                            type +
                            '-empty'
                        ).show();

                    }

                }
            );


        })(jQuery);

    });
</script>
