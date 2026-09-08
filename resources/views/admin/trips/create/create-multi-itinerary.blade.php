<div class="col-md-12">

    <div class="panel">

        <div class="panel-heading">
            <span class="panel-title">
                <i class="glyphicon glyphicon-list-alt"></i>
                Trip Itinerary
            </span>
        </div>

        <div class="panel-body">

            {{-- =========================================================
                SEASON TABS
            ========================================================== --}}
            <ul class="nav nav-tabs itinerary-season-tabs" role="tablist">

                <li class="active">
                    <a href="#season-summer" data-toggle="tab">
                        <i class="glyphicon glyphicon-sun"></i>
                        Summer
                    </a>
                </li>

                <li>
                    <a href="#season-winter" data-toggle="tab">
                        <i class="glyphicon glyphicon-snowflake"></i>
                        Winter
                    </a>
                </li>

                <li>
                    <a href="#season-autumn" data-toggle="tab">
                        <i class="glyphicon glyphicon-leaf"></i>
                        Autumn
                    </a>
                </li>

            </ul>


            <div class="tab-content" style="margin-top:20px;">


                {{-- =====================================================
                    SUMMER
                ====================================================== --}}
                <div class="tab-pane active" id="season-summer">

                    <div class="season-header">

                        <div>
                            <h4 style="margin:0;">
                                <i class="glyphicon glyphicon-sun"></i>
                                Summer Itineraries
                            </h4>

                            <small class="text-muted">
                                Add 1 to 3 itineraries for the summer season.
                            </small>
                        </div>

                        <button
                            type="button"
                            class="btn btn-primary add-season-itinerary"
                            data-season="summer">

                            <i class="glyphicon glyphicon-plus"></i>
                            Add Itinerary

                        </button>

                    </div>

                    <div
                        class="itinerary-container"
                        id="summer-itineraries"
                        data-season="summer">

                        {{-- First itinerary --}}
                        @include(
                            'admin.trips.create.partials.itinerary-block',
                            [
                                'season' => 'summer',
                                'itineraryIndex' => 0,
                                'itineraryNumber' => 1
                            ]
                        )

                    </div>

                </div>


                {{-- =====================================================
                    WINTER
                ====================================================== --}}
                <div class="tab-pane" id="season-winter">

                    <div class="season-header">

                        <div>
                            <h4 style="margin:0;">
                                <i class="glyphicon glyphicon-snowflake"></i>
                                Winter Itineraries
                            </h4>

                            <small class="text-muted">
                                Add 1 to 3 itineraries for the winter season.
                            </small>
                        </div>

                        <button
                            type="button"
                            class="btn btn-primary add-season-itinerary"
                            data-season="winter">

                            <i class="glyphicon glyphicon-plus"></i>
                            Add Itinerary

                        </button>

                    </div>

                    <div
                        class="itinerary-container"
                        id="winter-itineraries"
                        data-season="winter">

                        @include(
                            'admin.trips.create.partials.itinerary-block',
                            [
                                'season' => 'winter',
                                'itineraryIndex' => 0,
                                'itineraryNumber' => 1
                            ]
                        )

                    </div>

                </div>


                {{-- =====================================================
                    AUTUMN
                ====================================================== --}}
                <div class="tab-pane" id="season-autumn">

                    <div class="season-header">

                        <div>
                            <h4 style="margin:0;">
                                <i class="glyphicon glyphicon-leaf"></i>
                                Autumn Itineraries
                            </h4>

                            <small class="text-muted">
                                Add 1 to 3 itineraries for the autumn season.
                            </small>
                        </div>

                        <button
                            type="button"
                            class="btn btn-primary add-season-itinerary"
                            data-season="autumn">

                            <i class="glyphicon glyphicon-plus"></i>
                            Add Itinerary

                        </button>

                    </div>

                    <div
                        class="itinerary-container"
                        id="autumn-itineraries"
                        data-season="autumn">

                        @include(
                            'admin.trips.create.partials.itinerary-block',
                            [
                                'season' => 'autumn',
                                'itineraryIndex' => 0,
                                'itineraryNumber' => 1
                            ]
                        )

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    ITINERARY TEMPLATE
============================================================= --}}
<script type="text/template" id="itinerary-template">

    <div class="itinerary-block panel panel-default"
         data-itinerary-index="__INDEX__">

        <div class="panel-heading itinerary-block-heading">

            <strong>
                <i class="glyphicon glyphicon-list"></i>
                Itinerary __NUMBER__
            </strong>

            <div class="pull-right">

                <button
                    type="button"
                    class="btn btn-xs btn-info duplicate-itinerary">

                    <i class="glyphicon glyphicon-duplicate"></i>
                    Duplicate

                </button>

                <button
                    type="button"
                    class="btn btn-xs btn-danger remove-itinerary">

                    <i class="glyphicon glyphicon-trash"></i>
                    Remove

                </button>

            </div>

            <div class="clearfix"></div>

        </div>


        <div class="panel-body">

            {{-- ITINERARY INFORMATION --}}
            <div class="row">

                <div class="col-md-8">

                    <label>
                        Itinerary Title
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__INDEX__][title]"
                        class="form-control"
                        placeholder="e.g. Standard Everest Expedition">

                </div>


                <div class="col-md-4">

                    <label>
                        Status
                    </label>

                    <select
                        name="itineraries[__SEASON__][__INDEX__][status]"
                        class="form-control">

                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                    </select>

                </div>

            </div>


            <div class="row" style="margin-top:15px;">

                <div class="col-md-12">

                    <label>
                        Itinerary Description
                    </label>

                    <textarea
                        name="itineraries[__SEASON__][__INDEX__][description]"
                        class="form-control"
                        rows="3"
                        placeholder="Short description of this itinerary"></textarea>

                </div>

            </div>


            <hr>


            {{-- DAYS --}}
            <div class="itinerary-days-header">

                <div>

                    <strong>
                        Itinerary Days
                    </strong>

                    <small class="text-muted">
                        Add the day-by-day itinerary below.
                    </small>

                </div>

                <button
                    type="button"
                    class="btn btn-success btn-sm add-itinerary-day">

                    <i class="glyphicon glyphicon-plus"></i>
                    Add Day

                </button>

            </div>


            <div
                class="itinerary-days"
                data-season="__SEASON__"
                data-itinerary-index="__INDEX__">

                {{-- First day will be inserted by JS --}}

            </div>

        </div>

    </div>

</script>


{{-- =============================================================
    DAY TEMPLATE
============================================================= --}}
<script type="text/template" id="day-template">

    <div class="itinerary-day panel panel-info"
         data-day-index="__DAY_INDEX__">

        <div class="panel-heading">

            <strong>
                Day __DAY_NUMBER__
            </strong>

            <button
                type="button"
                class="btn btn-xs btn-danger pull-right remove-itinerary-day">

                <i class="glyphicon glyphicon-trash"></i>

            </button>

        </div>


        <div class="panel-body">

            {{-- TOP ROW --}}
            <div class="row">

                <div class="col-md-1">

                    <label>
                        Ordering
                    </label>

                    <input
                        type="number"
                        min="1"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][ordering]"
                        class="form-control"
                        value="__DAY_NUMBER__">

                </div>


                <div class="col-md-2">

                    <label>
                        Day
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][day]"
                        class="form-control"
                        value="Day __DAY_NUMBER__">

                </div>


                <div class="col-md-5">

                    <label>
                        Title
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][title]"
                        class="form-control"
                        placeholder="e.g. Arrival in Kathmandu">

                </div>


                <div class="col-md-4">

                    <label>
                        Date
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][date]"
                        class="form-control"
                        placeholder="e.g. 15 September">

                </div>

            </div>


            {{-- SECOND ROW --}}
            <div class="row" style="margin-top:15px;">

                <div class="col-md-3">

                    <label>
                        Max Altitude
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][max_altitude]"
                        class="form-control"
                        placeholder="e.g. 1400m">

                </div>


                <div class="col-md-3">

                    <label>
                        Accommodation
                    </label>

                    <input
                        type="text"
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][accommodation]"
                        class="form-control"
                        placeholder="e.g. Hotel">

                </div>


                <div class="col-md-6">

                    <label>
                        Meals
                    </label>

                    <div style="padding-top:7px;">

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][meals][]"
                                value="Breakfast">
                            Breakfast
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][meals][]"
                                value="Lunch">
                            Lunch
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][meals][]"
                                value="Dinner">
                            Dinner
                        </label>

                    </div>

                </div>

            </div>


            {{-- ACTIVITIES --}}
            <div class="row" style="margin-top:15px;">

                <div class="col-md-12">

                    <label>
                        Activities
                    </label>

                    <div>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][activities][]"
                                value="Orientation">
                            Orientation
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][activities][]"
                                value="Trekking">
                            Trekking
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][activities][]"
                                value="Driving">
                            Driving
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][activities][]"
                                value="Flight">
                            Flight
                        </label>

                        <label class="checkbox-inline">
                            <input
                                type="checkbox"
                                name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][activities][]"
                                value="Rest">
                            Rest Day
                        </label>

                    </div>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="row" style="margin-top:15px;">

                <div class="col-md-12">

                    <label>
                        Description
                    </label>

                    <textarea
                        name="itineraries[__SEASON__][__ITINERARY_INDEX__][days][__DAY_INDEX__][content]"
                        class="form-control"
                        rows="4"
                        placeholder="Day description..."></textarea>

                </div>

            </div>

        </div>

    </div>

</script>
