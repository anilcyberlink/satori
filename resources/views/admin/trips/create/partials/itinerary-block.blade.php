<div class="itinerary-block panel panel-default"
     data-itinerary-index="{{ $itineraryIndex }}">

    <div class="panel-heading itinerary-block-heading">

        <strong>
            <i class="glyphicon glyphicon-list"></i>
            Itinerary {{ $itineraryNumber }}
        </strong>

        <div class="pull-right">

            @if($itineraryNumber > 1)

                <button
                    type="button"
                    class="btn btn-xs btn-danger remove-itinerary">

                    <i class="glyphicon glyphicon-trash"></i>
                    Remove

                </button>

            @endif

        </div>

        <div class="clearfix"></div>

    </div>


    <div class="panel-body">

        <div class="row">

            <div class="col-md-8">

                <label>Itinerary Title</label>

                <input
                    type="text"
                    name="itineraries[{{ $season }}][{{ $itineraryIndex }}][title]"
                    class="form-control"
                    placeholder="e.g. Standard Summer Expedition">

            </div>


            <div class="col-md-4">

                <label>Status</label>

                <select
                    name="itineraries[{{ $season }}][{{ $itineraryIndex }}][status]"
                    class="form-control">

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>

            </div>

        </div>


        <div class="row" style="margin-top:15px;">

            <div class="col-md-12">

                <label>Itinerary Description</label>

                <textarea
                    name="itineraries[{{ $season }}][{{ $itineraryIndex }}][description]"
                    class="form-control"
                    rows="3"
                    placeholder="Short description of this itinerary"></textarea>

            </div>

        </div>


        <hr>


        <div class="itinerary-days-header">

            <strong>
                Itinerary Days
            </strong>

            <button
                type="button"
                class="btn btn-success btn-sm add-itinerary-day">

                <i class="glyphicon glyphicon-plus"></i>
                Add Day

            </button>

        </div>


        <div
            class="itinerary-days"
            data-season="{{ $season }}"
            data-itinerary-index="{{ $itineraryIndex }}">

        </div>

    </div>

</div>
<script>
$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Track itinerary count
    |--------------------------------------------------------------------------
    */

    var itineraryCounters = {
        summer: 1,
        winter: 1,
        autumn: 1
    };


    /*
    |--------------------------------------------------------------------------
    | Track day counters
    |--------------------------------------------------------------------------
    */

    var dayCounters = {};


    /*
    |--------------------------------------------------------------------------
    | Add Itinerary
    |--------------------------------------------------------------------------
    */

    $('.add-season-itinerary').on('click', function () {

        var season = $(this).data('season');

        var container = $('#' + season + '-itineraries');

        var currentCount = container.find('.itinerary-block').length;


        // Maximum 3
        if (currentCount >= 3) {

            alert('Maximum 3 itineraries are allowed for ' + season + '.');

            return;
        }


        var itineraryNumber = currentCount + 1;

        var itineraryIndex = currentCount;


        var template = $('#itinerary-template').html();


        template = template
            .replace(/__SEASON__/g, season)
            .replace(/__INDEX__/g, itineraryIndex)
            .replace(/__NUMBER__/g, itineraryNumber);


        container.append(template);


        /*
        |--------------------------------------------------------------------------
        | Initialize first day automatically
        |--------------------------------------------------------------------------
        */

        addDay(
            container.find('.itinerary-block').last()
        );


        /*
        |--------------------------------------------------------------------------
        | Update button
        |--------------------------------------------------------------------------
        */

        updateAddItineraryButton(season);

    });


    /*
    |--------------------------------------------------------------------------
    | Add Day
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.add-itinerary-day', function () {

        var itinerary = $(this).closest('.itinerary-block');

        addDay(itinerary);

    });


    /*
    |--------------------------------------------------------------------------
    | Add Day Function
    |--------------------------------------------------------------------------
    */

    function addDay(itinerary) {

        var season = itinerary
            .find('.itinerary-days')
            .data('season');


        var itineraryIndex = itinerary
            .data('itinerary-index');


        var key = season + '_' + itineraryIndex;


        if (typeof dayCounters[key] === 'undefined') {

            dayCounters[key] = 0;

        }


        var dayIndex = dayCounters[key];

        var dayNumber = dayIndex + 1;


        var template = $('#day-template').html();


        template = template
            .replace(/__SEASON__/g, season)
            .replace(/__ITINERARY_INDEX__/g, itineraryIndex)
            .replace(/__DAY_INDEX__/g, dayIndex)
            .replace(/__DAY_NUMBER__/g, dayNumber);


        itinerary
            .find('.itinerary-days')
            .append(template);


        dayCounters[key]++;

    }


    /*
    |--------------------------------------------------------------------------
    | Remove Day
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.remove-itinerary-day', function () {

        var day = $(this).closest('.itinerary-day');

        var itinerary = $(this).closest('.itinerary-block');

        var season = itinerary
            .find('.itinerary-days')
            .data('season');

        var itineraryIndex = itinerary
            .data('itinerary-index');


        var key = season + '_' + itineraryIndex;


        day.remove();


        /*
        |--------------------------------------------------------------------------
        | Re-number remaining days
        |--------------------------------------------------------------------------
        */

        renumberDays(itinerary);


        dayCounters[key] =
            itinerary.find('.itinerary-day').length;

    });


    /*
    |--------------------------------------------------------------------------
    | Remove Itinerary
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.remove-itinerary', function () {

        if (!confirm('Are you sure you want to remove this itinerary?')) {
            return;
        }


        var itinerary = $(this).closest('.itinerary-block');

        var season = itinerary
            .find('.itinerary-days')
            .data('season');


        itinerary.remove();


        renumberItineraries(season);

        updateAddItineraryButton(season);

    });


    /*
    |--------------------------------------------------------------------------
    | Renumber Itineraries
    |--------------------------------------------------------------------------
    */

    function renumberItineraries(season) {

        var container = $('#' + season + '-itineraries');


        container.find('.itinerary-block').each(function (index) {

            var itinerary = $(this);

            var number = index + 1;


            itinerary.attr(
                'data-itinerary-index',
                index
            );

            itinerary.data(
                'itinerary-index',
                index
            );


            itinerary
                .find('.itinerary-block-heading strong')
                .html(
                    '<i class="glyphicon glyphicon-list"></i> Itinerary ' + number
                );


            /*
            |--------------------------------------------------------------------------
            | Update all input names
            |--------------------------------------------------------------------------
            */

            itinerary.find('[name]').each(function () {

                var name = $(this).attr('name');


                name = name.replace(
                    /itineraries\[[^\]]+\]\[[^\]]+\]/,
                    'itineraries[' + season + '][' + index + ']'
                );


                $(this).attr('name', name);

            });


            /*
            |--------------------------------------------------------------------------
            | Update days
            |--------------------------------------------------------------------------
            */

            itinerary.find('.itinerary-days').attr(
                'data-itinerary-index',
                index
            );

            itinerary.find('.itinerary-days').data(
                'itinerary-index',
                index
            );


            renumberDays(itinerary);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Renumber Days
    |--------------------------------------------------------------------------
    */

    function renumberDays(itinerary) {

        var season = itinerary
            .find('.itinerary-days')
            .data('season');

        var itineraryIndex = itinerary
            .data('itinerary-index');


        itinerary.find('.itinerary-day').each(function (index) {

            var day = $(this);

            var number = index + 1;


            day.attr(
                'data-day-index',
                index
            );


            day.find('.panel-heading strong')
                .text('Day ' + number);


            day.find('[name]').each(function () {

                var name = $(this).attr('name');


                name = name.replace(
                    /days\[[^\]]+\]/,
                    'days[' + index + ']'
                );


                $(this).attr('name', name);

            });


            /*
            |--------------------------------------------------------------------------
            | Update ordering
            |--------------------------------------------------------------------------
            */

            day.find(
                'input[name$="[ordering]"]'
            ).val(number);


            /*
            |--------------------------------------------------------------------------
            | Update Day field
            |--------------------------------------------------------------------------
            */

            day.find(
                'input[name$="[day]"]'
            ).val('Day ' + String(number).padStart(2, '0'));

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Update Add Itinerary Button
    |--------------------------------------------------------------------------
    */

    function updateAddItineraryButton(season) {

        var count = $('#' + season + '-itineraries')
            .find('.itinerary-block')
            .length;


        var button = $('.add-season-itinerary[data-season="' + season + '"]');


        if (count >= 3) {

            button
                .prop('disabled', true)
                .html(
                    '<i class="glyphicon glyphicon-ok"></i> Maximum 3 Itineraries'
                );

        } else {

            button
                .prop('disabled', false)
                .html(
                    '<i class="glyphicon glyphicon-plus"></i> Add Itinerary'
                );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Initialize
    |--------------------------------------------------------------------------
    */

    $('.itinerary-container').each(function () {

        var container = $(this);

        var season = container.data('season');


        /*
        |--------------------------------------------------------------------------
        | Add first day to first itinerary
        |--------------------------------------------------------------------------
        */

        var firstItinerary = container.find('.itinerary-block').first();

        addDay(firstItinerary);


        updateAddItineraryButton(season);

    });

});

</script>
