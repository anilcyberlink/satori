<div class="col-md-12">

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Schedule </span>
            <a class="btn btn-primary pull-right add-schedule" data-added="0"><i class="glyphicon glyphicon-plus"></i>Add
                Row </a>
        </div>

        <div class="panel-body" id="row_schedule_body">
            <div class="row">

            </div>
            <div class="row" id="schedule-rec-1">

            </div>
        </div>

        <div style="display:none;">
            <div id="row_schedule_additional">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-2">
                            <label>Ordering</label>
                            <input type="number" min="1" max="2000" name="schedule_ordering[]"
                                class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" min="{{ date('Y-m-d') }}" name="schedule_start_date[]"
                                class="form-control" placeholder="DD-MM-YY" />
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" min="{{ date('Y-m-d') }}" name="schedule_end_date[]"
                                class="form-control" placeholder="DD-MM-YY" />
                        </div>
                        <div class="col-md-2">
                            <label>Availability</label>
                            <select name="schedule_availability[]" class="form-control">
                                @if ($availability)
                                    @foreach ($availability as $row)
                                        <option value="{{ $row }}"> {{ $row }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-schedule" schedule-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-md-2">
                            <label>Price (In USD $)</label>
                            <input type="number" name="schedule_price[]" class="form-control" placeholder="" min="1" />
                        </div>
                        <div class="col-md-2">
                            <label>Price After Discount</label>
                            <input type="number" name="schedule_disprice[]" class="form-control" placeholder="" min="1" />
                        </div>
                        <div class="col-md-2">
                            <label>Total Seats</label>
                            <input type="number" name="schedule_seats[]" class="form-control" placeholder="" min="1" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <hr style="border: 0; border-top: 2px solid #000; margin: 20px 0;">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
