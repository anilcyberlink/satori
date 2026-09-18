<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Extra Info</span>
        <a href="javascript:void(0);" class="btn btn-primary pull-right add-info" data-added="0">
            <i class="glyphicon glyphicon-plus"></i> Add Row
        </a>
    </div>
    <div class="panel-body" id="row_info_body">
        <div id="info-container">
            @if (isset($infos) && $infos->count())
                @foreach ($infos as $info)
                    <div class="info-item" id="info-rec-{{ $info->id }}">
                        <input type="hidden" name="info_id[]" value="{{ $info->id }}">
                        <div class="row" style="margin-bottom:15px;">
                            <div class="col-md-2">
                                <label>Ordering</label>
                                <input type="number" min="1" name="info_ordering[]" class="form-control"
                                    placeholder="SN" value="{{ $info->ordering }}">
                            </div>
                            <div class="col-md-4">
                                <label>Mountain Name</label>
                                <input type="text" name="info_title[]" class="form-control" placeholder="Name"
                                    value="{{ $info->title }}">
                            </div>
                            <div class="col-md-4">
                                <label>Summit Year</label>
                                <input type="text" name="info_description[]" class="form-control"
                                    placeholder="Year and short description" value="{{ $info->description }}">
                            </div>
                            <div class="col-md-2">
                                <label>Action</label>
                                <button type="button" class="btn btn-danger delete-info"
                                    info-data-id="{{ $info->id }}" info-rowid="{{ $info->id }}">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div style="display:none;">
        <div id="row_info_additional">
            <div class="info-item">
                <input type="hidden" name="info_id[]" value="" disabled>
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-2">
                        <label>Ordering</label>
                        <input type="number" min="1" name="info_ordering[]" class="form-control"
                            placeholder="SN" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Mountain Name</label>
                        <input type="text" name="info_title[]" class="form-control" placeholder="Name" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Summit Year</label>
                        <input type="text" name="info_description[]" class="form-control" placeholder="Year and short description"
                            disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Action</label>
                        <button type="button" class="btn btn-danger delete-info" info-data-id="0">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
