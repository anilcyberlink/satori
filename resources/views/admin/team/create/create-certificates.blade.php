<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Certificates</span>
        <a href="javascript:void(0);" class="btn btn-primary pull-right add-certificates" data-added="0">
            <i class="glyphicon glyphicon-plus"></i> Add Row
        </a>
    </div>

    <div class="panel-body" id="row_certificates_body">
        <div id="certificates-container"></div>
    </div>

    <div style="display:none;">
        <div id="row_certificates_additional">
            <div class="certificate-item">
                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-2">
                        <label>Ordering</label>
                        <input type="number" min="1" name="certificates_ordering[]" class="form-control" placeholder="SN">
                    </div>

                    <div class="col-md-7">
                        <label>Title</label>
                        <input type="text" name="certificates_title[]" class="form-control" placeholder="Title">
                    </div>

                    <div class="col-md-2">
                        <label>Action</label>
                        <button type="button" class="btn btn-danger delete-certificates" certificates-data-id="0">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>
                </div>

                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-4">
                        <label>Image</label>
                        <input type="file" name="image[]" class="form-control">
                    </div>

                    <div class="col-md-5">
                        <label>Type</label>
                        <select name="type[]" class="form-control">
                            <option value="certificate" selected>Certificate</option>
                            <option value="photos">Photos</option>
                        </select>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</div>
