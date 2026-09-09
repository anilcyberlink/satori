<div class="col-12">

    <div class="card mi-wrapper">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-route"></i>
                Trip Itinerary (By Season)
            </h3>
        </div>

        <div class="card-body">

            {{-- =====================================================
                SEASON TABS
            ====================================================== --}}

            <div class="mi-season-tabs">

                @foreach ([
                    'summer' => [
                        'label' => 'Summer',
                        'icon' => 'fa-sun'
                    ],
                    'winter' => [
                        'label' => 'Winter',
                        'icon' => 'fa-snowflake'
                    ],
                    'autumn' => [
                        'label' => 'Autumn',
                        'icon' => 'fa-leaf'
                    ]
                ] as $seasonKey => $seasonData)

                    <button type="button"
                            class="mi-season-tab-btn {{ $loop->first ? 'active' : '' }}"
                            data-mi-season="{{ $seasonKey }}">

                        <i class="fa {{ $seasonData['icon'] }}"></i>

                        {{ $seasonData['label'] }}

                        <span class="mi-count-badge"
                              data-mi-count-for="{{ $seasonKey }}">
                            0/3
                        </span>

                    </button>

                @endforeach

            </div>


            {{-- =====================================================
                SEASON PANELS
            ====================================================== --}}

            <div class="mi-season-panels">

                @foreach ([
                    'summer' => 'Summer',
                    'winter' => 'Winter',
                    'autumn' => 'Autumn'
                ] as $seasonKey => $seasonLabel)

                    <div class="mi-season-panel {{ $loop->first ? 'active' : '' }}"
                         data-mi-season-panel="{{ $seasonKey }}">

                        <div class="mi-season-panel-header">

                            <div>

                                <h5>
                                    {{ $seasonLabel }} Itineraries
                                </h5>

                                <small class="text-muted">
                                    Add up to 3 itineraries for {{ $seasonLabel }}.
                                    Leave empty if this trip isn't offered in this season.
                                </small>

                            </div>


                            <button type="button"
                                    class="mi-btn mi-btn-primary mi-add-itinerary"
                                    data-mi-season="{{ $seasonKey }}">

                                <i class="fa fa-plus"></i>
                                Add Itinerary

                            </button>

                        </div>


                        {{-- =================================================
                            EMPTY STATE
                        ================================================== --}}

                        <div class="mi-empty-state"
                             data-mi-empty-for="{{ $seasonKey }}">

                            <i class="fa fa-calendar-times"></i>

                            <p>
                                No itinerary added for {{ $seasonLabel }} yet.
                            </p>

                        </div>


                        {{-- =================================================
                            EXISTING ITINERARIES
                        ================================================== --}}

                        <div class="mi-itinerary-list"
                             data-mi-season-list="{{ $seasonKey }}">

                            @php
                                $seasonItineraries =
                                    $multi_itineraries[$seasonKey] ?? [];
                            @endphp


                            @foreach ($seasonItineraries as $i => $itinerary)

                                <div class="mi-itinerary-card"
                                     data-mi-itinerary-index="{{ $i }}">

                                    {{-- =========================================
                                        ITINERARY HEADER
                                    ========================================== --}}

                                    <div class="mi-itinerary-card-header">

                                        <strong>
                                            <i class="fa fa-list"></i>
                                            Itinerary {{ $i + 1 }}
                                        </strong>


                                        <div class="mi-itinerary-actions">

                                            <button type="button"
                                                    class="mi-btn mi-btn-outline-danger mi-remove-itinerary">

                                                <i class="fa fa-trash"></i>
                                                Remove

                                            </button>

                                        </div>

                                    </div>


                                    <div class="mi-itinerary-card-body">

                                        {{-- =========================================
                                            EXISTING ITINERARY ID
                                        ========================================== --}}

                                        <input type="hidden"
                                               name="itineraries[{{ $seasonKey }}][{{ $i }}][id]"
                                               value="{{ $itinerary['id'] ?? '' }}">


                                        {{-- =========================================
                                            TITLE + STATUS
                                        ========================================== --}}

                                        <div class="mi-grid mi-grid-title-status">

                                            <div class="mi-field">

                                                <label>
                                                    Itinerary Title
                                                </label>

                                                <input type="text"
                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][title]"
                                                       class="mi-input"
                                                       value="{{ $itinerary['title'] ?? '' }}"
                                                       placeholder="e.g. Standard Summer Expedition">

                                            </div>


                                            <div class="mi-field">

                                                <label>
                                                    Status
                                                </label>

                                                <select name="itineraries[{{ $seasonKey }}][{{ $i }}][status]"
                                                        class="mi-input">

                                                    <option value="1"
                                                        {{ ($itinerary['status'] ?? 1) == 1 ? 'selected' : '' }}>
                                                        Active
                                                    </option>

                                                    <option value="0"
                                                        {{ ($itinerary['status'] ?? 1) == 0 ? 'selected' : '' }}>
                                                        Inactive
                                                    </option>

                                                </select>

                                            </div>

                                        </div>


                                        {{-- =========================================
                                            DESCRIPTION
                                        ========================================== --}}

                                        <div class="mi-field">

                                            <label>
                                                Itinerary Description
                                            </label>

                                            <textarea
                                                name="itineraries[{{ $seasonKey }}][{{ $i }}][description]"
                                                class="mi-input"
                                                rows="2"
                                                placeholder="Short description of this itinerary">{{ $itinerary['description'] ?? '' }}</textarea>

                                        </div>


                                        {{-- =========================================
                                            DAYS HEADER
                                        ========================================== --}}

                                        <div class="mi-days-header">

                                            <strong>
                                                Itinerary Days
                                            </strong>


                                            <button type="button"
                                                    class="mi-btn mi-btn-success mi-add-day">

                                                <i class="fa fa-plus"></i>
                                                Add Day

                                            </button>

                                        </div>


                                        {{-- =========================================
                                            DAY EMPTY STATE
                                        ========================================== --}}

                                        <div class="mi-day-empty-state">

                                            <p>
                                                No days added yet.
                                                Click "Add Day" to start building this itinerary.
                                            </p>

                                        </div>


                                        {{-- =========================================
                                            EXISTING DAYS
                                        ========================================== --}}

                                        <div class="mi-day-list"
                                             data-mi-season="{{ $seasonKey }}"
                                             data-mi-itinerary-index="{{ $i }}">

                                            @foreach (($itinerary['days'] ?? []) as $d => $day)

                                                <div class="mi-day-row"
                                                     data-mi-day-index="{{ $d }}">

                                                    {{-- =============================
                                                        DAY HEADER
                                                    ============================== --}}

                                                    <div class="mi-day-row-header">

                                                        <strong>
                                                            Day {{ $d + 1 }}
                                                        </strong>

                                                        <button type="button"
                                                                class="mi-btn mi-btn-outline-danger mi-remove-day">

                                                            <i class="fa fa-trash"></i>

                                                        </button>

                                                    </div>


                                                    <div class="mi-day-row-body">

                                                        {{-- =============================
                                                            EXISTING DAY ID
                                                        ============================== --}}

                                                        <input type="hidden"
                                                               name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][id]"
                                                               value="{{ $day['id'] ?? '' }}">


                                                        {{-- =============================
                                                            DAY ORDERING
                                                        ============================== --}}

                                                        <input type="hidden"
                                                               name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][ordering]"
                                                               class="mi-day-ordering"
                                                               value="{{ $day['ordering'] ?? ($d + 1) }}">


                                                        {{-- =============================
                                                            DAY / TITLE / DATE
                                                        ============================== --}}

                                                        <div class="mi-grid mi-grid-3">

                                                            <div class="mi-field">

                                                                <label>
                                                                    Day Label
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][day]"
                                                                       class="mi-input mi-day-label"
                                                                       value="{{ $day['day'] ?? ('Day ' . str_pad($d + 1, 2, '0', STR_PAD_LEFT)) }}"
                                                                       placeholder="e.g. Day 01">

                                                            </div>


                                                            <div class="mi-field">

                                                                <label>
                                                                    Title
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][title]"
                                                                       class="mi-input"
                                                                       value="{{ $day['title'] ?? '' }}"
                                                                       placeholder="e.g. Arrival in Kathmandu">

                                                            </div>


                                                            <div class="mi-field">

                                                                <label>
                                                                    Date
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][date]"
                                                                       class="mi-input"
                                                                       value="{{ $day['date'] ?? '' }}"
                                                                       placeholder="e.g. 15 September">

                                                            </div>

                                                        </div>


                                                        {{-- =============================
                                                            ALTITUDE / ACCOMMODATION /
                                                            FOOD / ACTIVITIES
                                                        ============================== --}}

                                                        <div class="mi-grid mi-grid-4">

                                                            <div class="mi-field">

                                                                <label>
                                                                    Max Altitude
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][max_altitude]"
                                                                       class="mi-input"
                                                                       value="{{ $day['max_altitude'] ?? '' }}"
                                                                       placeholder="e.g. 1400m">

                                                            </div>


                                                            <div class="mi-field">

                                                                <label>
                                                                    Accommodation
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][accommodation]"
                                                                       class="mi-input"
                                                                       value="{{ $day['accommodation'] ?? '' }}"
                                                                       placeholder="e.g. Hotel">

                                                            </div>


                                                            <div class="mi-field">

                                                                <label>
                                                                    Food
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][meals]"
                                                                       class="mi-input"
                                                                       value="{{ $day['meals'] ?? '' }}"
                                                                       placeholder="e.g. Breakfast, Lunch, Dinner">

                                                            </div>


                                                            <div class="mi-field">

                                                                <label>
                                                                    Activities
                                                                </label>

                                                                <input type="text"
                                                                       name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][activities]"
                                                                       class="mi-input"
                                                                       value="{{ $day['activities'] ?? '' }}"
                                                                       placeholder="e.g. Trekking, Sightseeing">

                                                            </div>

                                                        </div>


                                                        {{-- =============================
                                                            DAY DESCRIPTION
                                                        ============================== --}}

                                                        <div class="mi-field">

                                                            <label>
                                                                Description
                                                            </label>

                                                            <textarea
                                                                name="itineraries[{{ $seasonKey }}][{{ $i }}][days][{{ $d }}][content]"
                                                                class="mi-input"
                                                                rows="2"
                                                                placeholder="Day description...">{{ $day['content'] ?? '' }}</textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    TEMPLATE: NEW ITINERARY
============================================================= --}}

<script type="text/template" id="mi-itinerary-template">

    <div class="mi-itinerary-card"
         data-mi-itinerary-index="__I_INDEX__">

        <div class="mi-itinerary-card-header">

            <strong>
                <i class="fa fa-list"></i>
                Itinerary __I_NUM__
            </strong>

            <div class="mi-itinerary-actions">

                <button type="button"
                        class="mi-btn mi-btn-outline-danger mi-remove-itinerary">

                    <i class="fa fa-trash"></i>
                    Remove

                </button>

            </div>

        </div>


        <div class="mi-itinerary-card-body">

            {{-- New itinerary has no database ID yet --}}
            <input type="hidden"
                   name="itineraries[__SEASON__][__I_INDEX__][id]"
                   value="">


            <div class="mi-grid mi-grid-title-status">

                <div class="mi-field">

                    <label>
                        Itinerary Title
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][title]"
                           class="mi-input"
                           placeholder="e.g. Standard Summer Expedition">

                </div>


                <div class="mi-field">

                    <label>
                        Status
                    </label>

                    <select name="itineraries[__SEASON__][__I_INDEX__][status]"
                            class="mi-input">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>

            </div>


            <div class="mi-field">

                <label>
                    Itinerary Description
                </label>

                <textarea
                    name="itineraries[__SEASON__][__I_INDEX__][description]"
                    class="mi-input"
                    rows="2"
                    placeholder="Short description of this itinerary"></textarea>

            </div>


            <div class="mi-days-header">

                <strong>
                    Itinerary Days
                </strong>

                <button type="button"
                        class="mi-btn mi-btn-success mi-add-day">

                    <i class="fa fa-plus"></i>
                    Add Day

                </button>

            </div>


            <div class="mi-day-empty-state">

                <p>
                    No days added yet.
                    Click "Add Day" to start building this itinerary.
                </p>

            </div>


            <div class="mi-day-list"
                 data-mi-season="__SEASON__"
                 data-mi-itinerary-index="__I_INDEX__">
            </div>

        </div>

    </div>

</script>


{{-- =============================================================
    TEMPLATE: NEW DAY
============================================================= --}}

<script type="text/template" id="mi-day-template">

    <div class="mi-day-row"
         data-mi-day-index="__D_INDEX__">

        <div class="mi-day-row-header">

            <strong>
                Day __D_NUM__
            </strong>

            <button type="button"
                    class="mi-btn mi-btn-outline-danger mi-remove-day">

                <i class="fa fa-trash"></i>

            </button>

        </div>


        <div class="mi-day-row-body">

            {{-- New day has no database ID --}}
            <input type="hidden"
                   name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][id]"
                   value="">


            <input type="hidden"
                   name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][ordering]"
                   class="mi-day-ordering"
                   value="__D_NUM__">


            <div class="mi-grid mi-grid-3">

                <div class="mi-field">

                    <label>
                        Day Label
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][day]"
                           class="mi-input mi-day-label"
                           value="Day __D_NUM__"
                           placeholder="e.g. Day 01">

                </div>


                <div class="mi-field">

                    <label>
                        Title
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][title]"
                           class="mi-input"
                           placeholder="e.g. Arrival in Kathmandu">

                </div>


                <div class="mi-field">

                    <label>
                        Date
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][date]"
                           class="mi-input"
                           placeholder="e.g. 15 September">

                </div>

            </div>


            <div class="mi-grid mi-grid-4">

                <div class="mi-field">

                    <label>
                        Max Altitude
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][max_altitude]"
                           class="mi-input"
                           placeholder="e.g. 1400m">

                </div>


                <div class="mi-field">

                    <label>
                        Accommodation
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][accommodation]"
                           class="mi-input"
                           placeholder="e.g. Hotel">

                </div>


                <div class="mi-field">

                    <label>
                        Food
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][meals]"
                           class="mi-input"
                           placeholder="e.g. Breakfast, Lunch, Dinner">

                </div>


                <div class="mi-field">

                    <label>
                        Activities
                    </label>

                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][activities]"
                           class="mi-input"
                           placeholder="e.g. Trekking, Sightseeing">

                </div>

            </div>


            <div class="mi-field">

                <label>
                    Description
                </label>

                <textarea
                    name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][content]"
                    class="mi-input"
                    rows="2"
                    placeholder="Day description..."></textarea>

            </div>

        </div>

    </div>

</script>


{{-- =============================================================
    STYLES
============================================================= --}}

<style>

    .mi-season-tabs {
        display: flex;
        gap: 10px;
        margin-bottom: 18px;
        flex-wrap: wrap;
    }

    .mi-season-tab-btn {
        border: 1px solid #d2d6de;
        background: #f4f6f9;
        border-radius: 6px;
        padding: 8px 16px;
        cursor: pointer;
        font-weight: 600;
        color: #555;
        font-size: 14px;
        line-height: 1;
    }

    .mi-season-tab-btn i {
        margin-right: 6px;
    }

    .mi-season-tab-btn.active {
        background: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .mi-count-badge {
        margin-left: 6px;
        font-size: 11px;
        background: rgba(0,0,0,0.15);
        border-radius: 10px;
        padding: 1px 7px;
    }

    .mi-season-panel {
        display: none;
    }

    .mi-season-panel.active {
        display: block;
    }

    .mi-season-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 14px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .mi-season-panel-header h5 {
        margin: 0 0 4px 0;
    }

    .mi-empty-state {
        text-align: center;
        padding: 26px 15px;
        color: #999;
        border: 2px dashed #e2e2e2;
        border-radius: 8px;
    }

    .mi-empty-state i {
        font-size: 26px;
        display: block;
        margin-bottom: 6px;
    }

    .mi-empty-state p {
        margin: 0;
    }

    .mi-itinerary-card {
        margin-bottom: 16px;
        border: 1px solid #e2e2e2;
        border-radius: 6px;
        overflow: hidden;
        background: #fff;
    }

    .mi-itinerary-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
        padding: 10px 14px;
        border-bottom: 1px solid #e9e9e9;
    }

    .mi-itinerary-actions .mi-btn {
        margin-left: 6px;
    }

    .mi-itinerary-card-body {
        padding: 14px;
    }

    .mi-days-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0 10px 0;
        padding-top: 10px;
        border-top: 1px solid #eee;
    }

    .mi-day-row {
        margin-bottom: 10px;
        border: 1px solid #eee;
        border-radius: 6px;
        overflow: hidden;
        background: #fcfcfc;
    }

    .mi-day-row-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f2f2f2;
        padding: 6px 12px;
    }

    .mi-day-row-body {
        padding: 12px;
    }

    .mi-day-empty-state {
        display: none;
        text-align: center;
        padding: 12px;
        color: #aaa;
        font-size: 13px;
    }

    .mi-day-empty-state p {
        margin: 0;
    }

    .mi-grid {
        display: grid;
        gap: 12px;
        margin-bottom: 12px;
    }

    .mi-grid-title-status {
        grid-template-columns: 3fr 1fr;
    }

    .mi-grid-3 {
        grid-template-columns: 1fr 2fr 1fr;
    }

    .mi-grid-4 {
        grid-template-columns: repeat(4, 1fr);
    }

    @media (max-width: 768px) {

        .mi-grid-title-status,
        .mi-grid-3,
        .mi-grid-4 {
            grid-template-columns: 1fr;
        }

    }

    .mi-field {
        display: flex;
        flex-direction: column;
        margin-bottom: 12px;
    }

    .mi-grid .mi-field {
        margin-bottom: 0;
    }

    .mi-field label {
        font-size: 12.5px;
        font-weight: 600;
        color: #444;
        margin-bottom: 4px;
    }

    .mi-input {
        width: 100%;
        border: 1px solid #d2d6de;
        border-radius: 4px;
        padding: 7px 10px;
        font-size: 13.5px;
        box-sizing: border-box;
    }

    textarea.mi-input {
        resize: vertical;
    }

    .mi-input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.15);
    }

    .mi-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 4px;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1px solid transparent;
        line-height: 1.2;
    }

    .mi-btn:disabled {
        cursor: not-allowed;
        opacity: 0.65;
    }

    .mi-btn-primary {
        background: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .mi-btn-success {
        background: #28a745;
        border-color: #28a745;
        color: #fff;
    }

    .mi-btn-outline-danger {
        background: #fff;
        border-color: #dc3545;
        color: #dc3545;
    }

</style>


{{-- =============================================================
    JAVASCRIPT
============================================================= --}}

<script>

(function initMultiItinerary() {

    if (!window.jQuery) {

        setTimeout(initMultiItinerary, 50);

        return;
    }


    jQuery(function ($) {


        /*
        |--------------------------------------------------------------------------
        | Season tab switching
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-season-tab-btn', function () {

            var season = $(this).data('mi-season');

            $('.mi-season-tab-btn')
                .removeClass('active');

            $(this)
                .addClass('active');

            $('.mi-season-panel')
                .removeClass('active');

            $('.mi-season-panel[data-mi-season-panel="' + season + '"]')
                .addClass('active');

        });


        /*
        |--------------------------------------------------------------------------
        | Add Itinerary
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-add-itinerary', function () {

            var season = $(this).data('mi-season');

            var list = $(
                '.mi-itinerary-list[data-mi-season-list="' + season + '"]'
            );

            var currentCount =
                list.find('.mi-itinerary-card').length;


            if (currentCount >= 3) {

                alert(
                    'Maximum 3 itineraries are allowed for ' +
                    season +
                    '.'
                );

                return;
            }


            var index = currentCount;

            var number = currentCount + 1;


            var html = $('#mi-itinerary-template')
                .html()

                .replace(/__SEASON__/g, season)

                .replace(/__I_INDEX__/g, index)

                .replace(/__I_NUM__/g, number);


            list.append(html);

            updateSeasonUI(season);

        });


        /*
        |--------------------------------------------------------------------------
        | Remove Itinerary
        |--------------------------------------------------------------------------
        */

        $(document).on(
            'click',
            '.mi-remove-itinerary',
            function () {

                if (!confirm('Remove this itinerary?')) {
                    return;
                }


                var card =
                    $(this).closest('.mi-itinerary-card');

                var list =
                    card.closest('.mi-itinerary-list');

                var season =
                    list.data('mi-season-list');


                card.remove();


                renumberItineraries(season);

                updateSeasonUI(season);

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Add Day
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-add-day', function () {

            var card =
                $(this).closest('.mi-itinerary-card');

            var dayList =
                card.find('.mi-day-list');

            var season =
                dayList.data('mi-season');

            var itineraryIndex =
                dayList.data('mi-itinerary-index');

            var dayIndex =
                dayList.find('.mi-day-row').length;

            var dayNumber =
                dayIndex + 1;


            var html = $('#mi-day-template')
                .html()

                .replace(/__SEASON__/g, season)

                .replace(/__I_INDEX__/g, itineraryIndex)

                .replace(/__D_INDEX__/g, dayIndex)

                .replace(/__D_NUM__/g, dayNumber);


            dayList.append(html);

            updateDayEmptyState(card);

        });


        /*
        |--------------------------------------------------------------------------
        | Remove Day
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-remove-day', function () {

            var day =
                $(this).closest('.mi-day-row');

            var card =
                $(this).closest('.mi-itinerary-card');


            day.remove();

            renumberDays(card);

            updateDayEmptyState(card);

        });


        /*
        |--------------------------------------------------------------------------
        | Renumber Itineraries
        |--------------------------------------------------------------------------
        */

        function renumberItineraries(season) {

            var list =
                $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');


            list.find('.mi-itinerary-card').each(function (index) {

                var card =
                    $(this);

                var number =
                    index + 1;


                card.attr(
                    'data-mi-itinerary-index',
                    index
                );


                card.find(
                    '.mi-itinerary-card-header strong'
                ).html(
                    '<i class="fa fa-list"></i> Itinerary ' +
                    number
                );


                /*
                |--------------------------------------------------------------------------
                | Update input names
                |--------------------------------------------------------------------------
                */

                card.find('[name]').each(function () {

                    var name =
                        $(this).attr('name');


                    name = name.replace(
                        /itineraries\[[^\]]+\]\[[^\]]+\]/,
                        'itineraries[' +
                        season +
                        '][' +
                        index +
                        ']'
                    );


                    $(this).attr(
                        'name',
                        name
                    );

                });


                /*
                |--------------------------------------------------------------------------
                | Update day list index
                |--------------------------------------------------------------------------
                */

                card.find('.mi-day-list')
                    .attr(
                        'data-mi-itinerary-index',
                        index
                    )
                    .data(
                        'mi-itinerary-index',
                        index
                    );


                renumberDays(card);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Renumber Days
        |--------------------------------------------------------------------------
        */

        function renumberDays(card) {

            var dayList =
                card.find('.mi-day-list');

            var season =
                dayList.data('mi-season');

            var itineraryIndex =
                dayList.data('mi-itinerary-index');


            dayList.find('.mi-day-row').each(function (index) {

                var day =
                    $(this);

                var number =
                    index + 1;


                day.attr(
                    'data-mi-day-index',
                    index
                );


                day.find(
                    '.mi-day-row-header strong'
                ).text(
                    'Day ' + number
                );


                day.find('[name]').each(function () {

                    var name =
                        $(this).attr('name');


                    name = name.replace(
                        /itineraries\[[^\]]+\]\[[^\]]+\]\[days\]/,
                        'itineraries[' +
                        season +
                        '][' +
                        itineraryIndex +
                        '][days]'
                    );


                    name = name.replace(
                        /days\[[^\]]+\]/,
                        'days[' +
                        index +
                        ']'
                    );


                    $(this).attr(
                        'name',
                        name
                    );

                });


                day.find('.mi-day-ordering')
                    .val(number);


                /*
                |--------------------------------------------------------------------------
                | Only set default label if empty
                |--------------------------------------------------------------------------
                */

                if (
                    !day.find('.mi-day-label').val()
                ) {

                    day.find('.mi-day-label').val(
                        'Day ' +
                        String(number).padStart(2, '0')
                    );

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Season UI
        |--------------------------------------------------------------------------
        */

        function updateSeasonUI(season) {

            var list =
                $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');


            var count =
                list.find('.mi-itinerary-card').length;


            $('.mi-count-badge[data-mi-count-for="' + season + '"]')
                .text(
                    count + '/3'
                );


            $('.mi-empty-state[data-mi-empty-for="' + season + '"]')
                .toggle(
                    count === 0
                );


            var addBtn =
                $('.mi-add-itinerary[data-mi-season="' + season + '"]');


            if (count >= 3) {

                addBtn
                    .prop('disabled', true)
                    .html(
                        '<i class="fa fa-check"></i> Maximum reached'
                    );

            } else {

                addBtn
                    .prop('disabled', false)
                    .html(
                        '<i class="fa fa-plus"></i> Add Itinerary'
                    );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Day Empty State
        |--------------------------------------------------------------------------
        */

        function updateDayEmptyState(card) {

            var dayList =
                card.find('.mi-day-list');

            var count =
                dayList.find('.mi-day-row').length;


            card.find('.mi-day-empty-state')
                .toggle(
                    count === 0
                );

        }


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE EXISTING EDIT DATA
        |--------------------------------------------------------------------------
        */

        ['summer', 'winter', 'autumn'].forEach(function (season) {

            var list =
                $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');


            /*
            |--------------------------------------------------------------------------
            | Existing itinerary cards
            |--------------------------------------------------------------------------
            */

            list.find('.mi-itinerary-card').each(function () {

                var card =
                    $(this);


                /*
                |--------------------------------------------------------------------------
                | Existing days
                |--------------------------------------------------------------------------
                */

                renumberDays(card);

                updateDayEmptyState(card);

            });


            /*
            |--------------------------------------------------------------------------
            | Update season counter / empty state
            |--------------------------------------------------------------------------
            */

            updateSeasonUI(season);

        });

    });

})();

</script>
