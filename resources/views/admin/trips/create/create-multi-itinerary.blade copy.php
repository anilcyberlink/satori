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
                SEASON TABS (custom, not dependent on Bootstrap tab.js)
            ====================================================== --}}
            <div class="mi-season-tabs">

                <button type="button" class="mi-season-tab-btn active" data-mi-season="summer">
                    <i class="fa fa-sun"></i>
                    Summer
                    <span class="mi-count-badge" data-mi-count-for="summer">0/3</span>
                </button>

                <button type="button" class="mi-season-tab-btn" data-mi-season="winter">
                    <i class="fa fa-snowflake"></i>
                    Winter
                    <span class="mi-count-badge" data-mi-count-for="winter">0/3</span>
                </button>

                <button type="button" class="mi-season-tab-btn" data-mi-season="autumn">
                    <i class="fa fa-leaf"></i>
                    Autumn
                    <span class="mi-count-badge" data-mi-count-for="autumn">0/3</span>
                </button>

            </div>


            <div class="mi-season-panels">

                @foreach (['summer' => 'Summer', 'winter' => 'Winter', 'autumn' => 'Autumn'] as $seasonKey => $seasonLabel)

                    <div class="mi-season-panel {{ $loop->first ? 'active' : '' }}"
                         data-mi-season-panel="{{ $seasonKey }}">

                        <div class="mi-season-panel-header">

                            <div>
                                <h5>{{ $seasonLabel }} Itineraries</h5>
                                <small class="text-muted">
                                    Add up to 3 itineraries for {{ $seasonLabel }}. Leave empty if this trip
                                    isn't offered in this season.
                                </small>
                            </div>

                            <button type="button"
                                    class="mi-btn mi-btn-primary mi-add-itinerary"
                                    data-mi-season="{{ $seasonKey }}">
                                <i class="fa fa-plus"></i>
                                Add Itinerary
                            </button>

                        </div>

                        <div class="mi-empty-state" data-mi-empty-for="{{ $seasonKey }}">
                            <i class="fa fa-calendar-times"></i>
                            <p>No itinerary added for {{ $seasonLabel }} yet.</p>
                        </div>

                        <div class="mi-itinerary-list" data-mi-season-list="{{ $seasonKey }}"></div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    TEMPLATE: one itinerary card
============================================================= --}}
<script type="text/template" id="mi-itinerary-template">

    <div class="mi-itinerary-card" data-mi-itinerary-index="__I_INDEX__">

        <div class="mi-itinerary-card-header">

            <strong>
                <i class="fa fa-list"></i>
                Itinerary __I_NUM__
            </strong>

            <div class="mi-itinerary-actions">

                <button type="button" class="mi-btn mi-btn-outline-info mi-duplicate-itinerary">
                    <i class="fa fa-clone"></i>
                    Duplicate
                </button>

                <button type="button" class="mi-btn mi-btn-outline-danger mi-remove-itinerary">
                    <i class="fa fa-trash"></i>
                    Remove
                </button>

            </div>

        </div>

        <div class="mi-itinerary-card-body">

            <div class="mi-grid mi-grid-title-status">

                <div class="mi-field">
                    <label>Itinerary Title</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][title]"
                           class="mi-input"
                           placeholder="e.g. Standard Summer Expedition">
                </div>

                <div class="mi-field">
                    <label>Status</label>
                    <select name="itineraries[__SEASON__][__I_INDEX__][status]" class="mi-input">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>

            <div class="mi-field">
                <label>Itinerary Description</label>
                <textarea name="itineraries[__SEASON__][__I_INDEX__][description]"
                          class="mi-input"
                          rows="2"
                          placeholder="Short description of this itinerary"></textarea>
            </div>

            <div class="mi-days-header">

                <strong>Itinerary Days</strong>

                <button type="button" class="mi-btn mi-btn-success mi-add-day">
                    <i class="fa fa-plus"></i>
                    Add Day
                </button>

            </div>

            <div class="mi-day-empty-state">
                <p>No days added yet. Click "Add Day" to start building this itinerary.</p>
            </div>

            <div class="mi-day-list"
                 data-mi-season="__SEASON__"
                 data-mi-itinerary-index="__I_INDEX__"></div>

        </div>

    </div>

</script>


{{-- =============================================================
    TEMPLATE: one day row
============================================================= --}}
<script type="text/template" id="mi-day-template">

    <div class="mi-day-row" data-mi-day-index="__D_INDEX__">

        <div class="mi-day-row-header">

            <strong>Day __D_NUM__</strong>

            <button type="button" class="mi-btn mi-btn-outline-danger mi-remove-day">
                <i class="fa fa-trash"></i>
            </button>

        </div>

        <div class="mi-day-row-body">

            <input type="hidden"
                   name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][ordering]"
                   class="mi-day-ordering"
                   value="__D_NUM__">

            <div class="mi-grid mi-grid-3">

                <div class="mi-field">
                    <label>Day Label</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][day]"
                           class="mi-input mi-day-label"
                           value="Day __D_NUM__">
                </div>

                <div class="mi-field">
                    <label>Title</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][title]"
                           class="mi-input"
                           placeholder="e.g. Arrival in Kathmandu">
                </div>

                <div class="mi-field">
                    <label>Date</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][date]"
                           class="mi-input"
                           placeholder="e.g. 15 September">
                </div>

            </div>

            <div class="mi-grid mi-grid-4">

                <div class="mi-field">
                    <label>Max Altitude</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][max_altitude]"
                           class="mi-input"
                           placeholder="e.g. 1400m">
                </div>

                <div class="mi-field">
                    <label>Accommodation</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][accommodation]"
                           class="mi-input"
                           placeholder="e.g. Hotel">
                </div>

                <div class="mi-field">
                    <label>Food</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][meals]"
                           class="mi-input"
                           placeholder="e.g. Breakfast, Lunch, Dinner">
                </div>

                <div class="mi-field">
                    <label>Activities</label>
                    <input type="text"
                           name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][activities]"
                           class="mi-input"
                           placeholder="e.g. Trekking, Sightseeing">
                </div>

            </div>

            <div class="mi-field">
                <label>Description</label>
                <textarea name="itineraries[__SEASON__][__I_INDEX__][days][__D_INDEX__][content]"
                          class="mi-input"
                          rows="2"
                          placeholder="Day description..."></textarea>
            </div>

        </div>

    </div>

</script>


{{-- =============================================================
    STYLES — all self-contained so nothing depends on the theme's
    bootstrap variant, and nothing here can leak/collide either.
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

    /* ---------- Itinerary card ---------- */

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

    /* ---------- Day row ---------- */

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

    /* ---------- Field grid (custom, doesn't depend on theme's bootstrap gutters) ---------- */

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

    /* ---------- Buttons (self-styled, no dependency on theme's button classes) ---------- */

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

    .mi-btn-outline-info {
        background: #fff;
        border-color: #17a2b8;
        color: #17a2b8;
    }

    .mi-btn-outline-danger {
        background: #fff;
        border-color: #dc3545;
        color: #dc3545;
    }

</style>


{{-- =============================================================
    LOGIC — wrapped so it works no matter when jQuery loads
============================================================= --}}
<script>
(function initMultiItinerary() {

    if (!window.jQuery) {
        // jQuery not loaded yet on this pass -- try again shortly.
        setTimeout(initMultiItinerary, 50);
        return;
    }

    jQuery(function ($) {

        /*
        |--------------------------------------------------------------------------
        | Season tab switching (custom, framework-independent)
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-season-tab-btn', function () {

            var season = $(this).data('mi-season');

            $('.mi-season-tab-btn').removeClass('active');
            $(this).addClass('active');

            $('.mi-season-panel').removeClass('active');
            $('.mi-season-panel[data-mi-season-panel="' + season + '"]').addClass('active');

        });


        /*
        |--------------------------------------------------------------------------
        | Add Itinerary (max 3 per season)
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-add-itinerary', function () {

            var season = $(this).data('mi-season');
            var list = $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');
            var currentCount = list.find('.mi-itinerary-card').length;

            if (currentCount >= 3) {
                alert('Maximum 3 itineraries are allowed for ' + season + '.');
                return;
            }

            var index = currentCount;
            var number = currentCount + 1;

            var html = $('#mi-itinerary-template').html()
                .replace(/__SEASON__/g, season)
                .replace(/__I_INDEX__/g, index)
                .replace(/__I_NUM__/g, number);

            list.append(html);

            updateSeasonUI(season);

        });


        /*
        |--------------------------------------------------------------------------
        | Duplicate Itinerary
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-duplicate-itinerary', function () {

            var card = $(this).closest('.mi-itinerary-card');
            var list = card.closest('.mi-itinerary-list');
            var season = list.data('mi-season-list');
            var currentCount = list.find('.mi-itinerary-card').length;

            if (currentCount >= 3) {
                alert('Maximum 3 itineraries are allowed for ' + season + '.');
                return;
            }

            var clone = card.clone(true, true);
            list.append(clone);

            renumberItineraries(season);
            updateSeasonUI(season);

        });


        /*
        |--------------------------------------------------------------------------
        | Remove Itinerary
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-remove-itinerary', function () {

            if (!confirm('Remove this itinerary?')) {
                return;
            }

            var card = $(this).closest('.mi-itinerary-card');
            var list = card.closest('.mi-itinerary-list');
            var season = list.data('mi-season-list');

            card.remove();

            renumberItineraries(season);
            updateSeasonUI(season);

        });


        /*
        |--------------------------------------------------------------------------
        | Add Day
        |--------------------------------------------------------------------------
        */

        $(document).on('click', '.mi-add-day', function () {

            var card = $(this).closest('.mi-itinerary-card');
            var dayList = card.find('.mi-day-list');
            var season = dayList.data('mi-season');
            var itineraryIndex = dayList.data('mi-itinerary-index');

            var dayIndex = dayList.find('.mi-day-row').length;
            var dayNumber = dayIndex + 1;

            var html = $('#mi-day-template').html()
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

            var day = $(this).closest('.mi-day-row');
            var card = $(this).closest('.mi-itinerary-card');

            day.remove();

            renumberDays(card);
            updateDayEmptyState(card);

        });


        /*
        |--------------------------------------------------------------------------
        | Renumber all itineraries in a season after add/remove/duplicate
        |--------------------------------------------------------------------------
        */

        function renumberItineraries(season) {

            var list = $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');

            list.find('.mi-itinerary-card').each(function (index) {

                var card = $(this);
                var number = index + 1;

                card.attr('data-mi-itinerary-index', index);

                card.find('.mi-itinerary-card-header strong').html(
                    '<i class="fa fa-list"></i> Itinerary ' + number
                );

                card.find('[name]').each(function () {
                    var name = $(this).attr('name');
                    name = name.replace(
                        /itineraries\[[^\]]+\]\[[^\]]+\]/,
                        'itineraries[' + season + '][' + index + ']'
                    );
                    $(this).attr('name', name);
                });

                card.find('.mi-day-list')
                    .attr('data-mi-itinerary-index', index)
                    .data('mi-itinerary-index', index);

                renumberDays(card);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Renumber days inside one itinerary card
        |--------------------------------------------------------------------------
        */

        function renumberDays(card) {

            var dayList = card.find('.mi-day-list');
            var season = dayList.data('mi-season');
            var itineraryIndex = dayList.data('mi-itinerary-index');

            dayList.find('.mi-day-row').each(function (index) {

                var day = $(this);
                var number = index + 1;

                day.attr('data-mi-day-index', index);

                day.find('.mi-day-row-header strong').text('Day ' + number);

                day.find('[name]').each(function () {

                    var name = $(this).attr('name');

                    name = name.replace(
                        /itineraries\[[^\]]+\]\[[^\]]+\]\[days\]/,
                        'itineraries[' + season + '][' + itineraryIndex + '][days]'
                    );

                    name = name.replace(
                        /days\[[^\]]+\]/,
                        'days[' + index + ']'
                    );

                    $(this).attr('name', name);

                });

                day.find('.mi-day-ordering').val(number);
                day.find('.mi-day-label').val('Day ' + String(number).padStart(2, '0'));

            });

        }


        /*
        |--------------------------------------------------------------------------
        | UI helpers
        |--------------------------------------------------------------------------
        */

        function updateSeasonUI(season) {

            var list = $('.mi-itinerary-list[data-mi-season-list="' + season + '"]');
            var count = list.find('.mi-itinerary-card').length;

            $('.mi-count-badge[data-mi-count-for="' + season + '"]').text(count + '/3');

            $('.mi-empty-state[data-mi-empty-for="' + season + '"]')
                .toggle(count === 0);

            var addBtn = $('.mi-add-itinerary[data-mi-season="' + season + '"]');

            if (count >= 3) {
                addBtn.prop('disabled', true).html('<i class="fa fa-check"></i> Maximum reached');
            } else {
                addBtn.prop('disabled', false).html('<i class="fa fa-plus"></i> Add Itinerary');
            }

        }

        function updateDayEmptyState(card) {

            var dayList = card.find('.mi-day-list');
            var count = dayList.find('.mi-day-row').length;

            card.find('.mi-day-empty-state').toggle(count === 0);

        }


        /*
        |--------------------------------------------------------------------------
        | Init -- everything starts empty, so just show empty states/badges
        |--------------------------------------------------------------------------
        */

        ['summer', 'winter', 'autumn'].forEach(function (season) {
            updateSeasonUI(season);
        });

    });

})();
</script>

CREATE TABLE `cl_multi_itineraries` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

  `trip_detail_id` BIGINT UNSIGNED NOT NULL,

  -- Season / itinerary-variant level info
  `season` VARCHAR(20) NOT NULL,                 -- summer | winter | autumn
  `itinerary_no` TINYINT UNSIGNED NOT NULL DEFAULT 1,   -- 1, 2, or 3
  `itinerary_title` VARCHAR(255) DEFAULT NULL,
  `itinerary_description` TEXT DEFAULT NULL,
  `itinerary_status` TINYINT(1) NOT NULL DEFAULT 1,     -- 1 = Active, 0 = Inactive

  -- Day level info
  `day_ordering` INT UNSIGNED DEFAULT NULL,
  `day_label` VARCHAR(50) DEFAULT NULL,          -- "Day 01"
  `day_title` VARCHAR(255) DEFAULT NULL,
  `day_date` VARCHAR(100) DEFAULT NULL,
  `max_altitude` VARCHAR(100) DEFAULT NULL,
  `accommodation` VARCHAR(150) DEFAULT NULL,
  `meals` VARCHAR(255) DEFAULT NULL,
  `activities` VARCHAR(255) DEFAULT NULL,
  `day_content` TEXT DEFAULT NULL,

  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,

  PRIMARY KEY (`id`),
  KEY `idx_trip_season_itinerary` (`trip_detail_id`, `season`, `itinerary_no`),

  CONSTRAINT `fk_multi_itinerary_trip`
    FOREIGN KEY (`trip_detail_id`)
    REFERENCES `cl_trip_details` (`id`)
    ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
