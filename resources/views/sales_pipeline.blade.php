@extends("layouts.base")

@section("content")
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> {{ $title }}
            <!-- <small>rowreorder extension demos</small> -->
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>{{ $title }}</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">

                        <div class="btn-group">
                            <button id="add_sales" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div class="btn-group pull-right top-actions">
                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" id="delete-table">
                                        <i class="icon-trash"></i> Delete </a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group pull-right top-actions hidden">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-download"></i>
                                <span class="hidden-xs"> Export </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="export_tools">
                                <li>
                                    <a href="javascript:;" data-action="0" class="tool-action">
                                        <i class="icon-printer"></i> Print</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="1" class="tool-action">
                                        <i class="icon-doc"></i> PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="2" class="tool-action">
                                        <i class="icon-paper-clip"></i> Excel</a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;" data-action="3" class="tool-action">
                                        <i class="icon-refresh"></i> Reload</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="col-md-12 no-padding">
                            @admin
                            <div class="form-group col-md-2 report-filter">
                                <label>State</label>
                                <select class="form-control" data-placeholder="Select a State" id="state-select"
                                    name="state">
                                    <option></option>
                                    <option value="-1">All</option>
                                    @forelse($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            @endadmin
                            <div class="form-group col-md-2 report-filter">
                                <label>District</label>
                                <select class="form-control" data-placeholder="Select a District" id="district_select"
                                    name="district">
                                    <option></option>
                                    <option value="-1">All</option>
                                    @forelse($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group col-md-2 report-filter">
                                <label>Mandal</label>
                                <select class="form-control" data-placeholder="Select a Mandal" id="mandal_select"
                                    name="mandal">
                                    <option></option>
                                    <option value="-1">All</option>
                                    @forelse($mandals as $mandal)
                                    <option value="{{ $mandal->id }}">{{ $mandal->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            {{--
                                <div class="form-group col-md-2 report-filter">
                                    <label>Village</label>
                                    <select class="form-control" data-placeholder="Select a Village" id="village_select" name="village">
                                        <option ></option>
                                        <option value="-1">All</option>
                                        @forelse($villages as $village)
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                            @empty
                            @endforelse
                            </select>
                        </div>
                        --}}

                        <div class="form-group col-md-2 report-filter">
                            <label>Dealer</label>
                            <select class="form-control" data-placeholder="Select a Dealer" id="dealer_select"
                                name="dealer">
                                <option></option>
                                <option value="-1">All</option>
                                @forelse($dealers as $dealer)
                                <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-2 report-filter">
                            <label>Staff</label>
                            <select class="form-control" data-placeholder="Select a Staff" id="salesman_select"
                                name="staff">
                                <option></option>
                                <option value="-1">All</option>
                                @forelse($salesman as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-2 report-filter">
                            <label>Crop</label>
                            <select class="form-control" data-placeholder="Select a Crop" id="crop_select" name="crop">
                                <option></option>
                                <option value="-1">All</option>
                                @forelse($crops as $crop)
                                <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-3 report-filter">
                            <label>Date</label>
                            <div id="reportrange" class="btn default col-sm-12">
                                <i class="fa fa-calendar"></i> &nbsp;
                                <span> </span>
                                <b class="fa fa-angle-down"></b>
                                <input type="text" class="form-control hidden" name="start_date" id="report-start">
                                <input type="text" class="form-control hidden" name="end_date" id="report-end">
                            </div>
                        </div>
                        <div class="form-group col-md-2 report-filter">
                            <label>Delete Request</label>
                            <select class="form-control" data-placeholder="Delete Request" id="delete_select"
                                name="deleted_data">
                                <option></option>
                                <option value="-1">All</option>
                                <option value="1">Delete Request</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                        id="manager_list">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable"
                                            data-set="#manager_list .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Farmer Name </th>
                                <th> Father Name </th>
                                <th> Aadhar / HP Number </th>
                                <th> Mobile Number </th>
                                <th> District </th>
                                <th> Mandal </th>
                                <th> Village </th>
                                <th> Dealer </th>
                                <th> Crop </th>
                                <th> Assigned To </th>
                                <th> Updated Date </th>
                                <th> Order Status </th>
                                <th> Delete Request </th>
                                <th> Status </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<!-- START MODAL -->

<!-- START ADD MODAL -->
<div id="add_sales_modal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">New Farmer Registration</h4>
            </div>
            <div class="modal-body">
                <div class="" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <form class="form col-sm-12" id="add-sales" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Name<sup class="text-danger">*</sup></label>
                                    <input class="form-control alpha-space" id="add-name" type="text"
                                        placeholder="Farmer Name" name="name" maxlength="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Father/Husband Name<sup class="text-danger">*</sup></label>
                                    <input class="form-control alpha-space" id="add-father-name" type="text"
                                        placeholder="Father/Husband Name" name="father_name" maxlength="100">
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Aadhar/ HP Number<sup class="text-danger">*</sup></label>
                                    <input class="form-control" id="add-aadhar-hp" type="text"
                                        placeholder="Aadhar/ HP Number" name="aadhar_hp" maxlength="12">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Mobile<sup class="text-danger">*</sup></label>
                                    <input class="form-control digit-only" id="add-mobile" type="text"
                                        placeholder="Mobile Number" name="mobile" maxlength="10">
                                </div>

                                <div class="form-group col-md-6 clearfix">
                                    <label>State<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a state" id="add-state_select"
                                        name="state">
                                        <option>Select a State</option>
                                        @forelse($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>District<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a district"
                                        id="add-district_select" name="district">
                                        <option>{{ "Select a District" }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 clearfix">
                                    <label>Mandal<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a Mandal"
                                        id="add-mandal_select" name="mandal">
                                        <option>{{ "Select a Mandal" }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Village<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a village"
                                        id="add-village_select" name="village">
                                        <option>{{ "Select a Village" }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Dealer<sup class="text-danger">*</sup></label>
                                    <select class="form-control dealer_select" data-placeholder="Select a Dealer"
                                        id="dealer_select" name="dealer">
                                        <option value="">{{ "Select a Dealer" }}</option>
                                        {{--@forelse($dealers as $dealer)
                                                <option value="{{ $dealer->id }}">{{ $dealer->name }} (
                                        {{ $dealer->vendor_no }} )</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse--}}
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Crop<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a crop" id="crop_select"
                                        name="crop">
                                        <option>Select Crop</option>
                                        @forelse($crops as $crop)
                                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Assigned To<sup class="text-danger">*</sup></label>
                                    <select class="form-control salesman_select" data-placeholder="Select a User"
                                        id="salesman_select" name="user">
                                        <option value="">{{ "Select a User" }}</option>
                                        {{--@forelse($salesman as $s)
                                                <option value="{{ $s->id }}">{{ $s->name }} ( {{ $s->employee_code }} )
                                        </option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse--}}
                                    </select>
                                </div>
                                <div class="form-group col-md-6 report-filter">
                                    <label>Registration Type<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a Type" id="add-fsa_select"
                                        name="fsa_type">
                                        <option value="">Select Registration Type</option>
                                        <option value="1">FSA Register</option>
                                        <option value="0">Sales Pipeline</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Stage<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a stage" id="add-stage_select"
                                        name="stage">
                                        <option value="">Select a Stage</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Area<sup class="text-danger">*</sup></label>
                                    <input class="form-control" id="add-area" type="text" placeholder="Area"
                                        name="area">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" class="btn green form-submit" data-loading-text="Adding...">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- END ADD MODAL -->

<!-- START EDIT MODAL -->
<div id="edit_sales_modal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Sales Pipeline</h4>
            </div>
            <div class="modal-body">
                <div class="" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <form class="form col-sm-12" id="edit-sales" enctype="multipart/form-data">
                            <input type="hidden" name="sales_data" class="sales_data">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Name<sup class="text-danger">*</sup></label>
                                    <input class="form-control alpha-space" id="edit-name" type="text"
                                        placeholder="Farmer Name" name="name" maxlength="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Father/Husband Name<sup class="text-danger">*</sup></label>
                                    <input class="form-control alpha-space" id="edit-father-name" type="text"
                                        placeholder="Father/Husband Name" name="father_name" maxlength="100">
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Aadhar/ HP Number<sup class="text-danger">*</sup></label>
                                    <input class="form-control" id="edit-aadhar-hp" type="text"
                                        placeholder="Aadhar/ HP Number" name="aadhar_hp" maxlength="12">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Mobile<sup class="text-danger">*</sup></label>
                                    <input class="form-control digit-only" id="edit-mobile" type="text"
                                        placeholder="Mobile Number" name="mobile" maxlength="10">
                                </div>

                                <div class="form-group col-md-6 clearfix">
                                    <label>State<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a state"
                                        id="edit-state_select" name="state">
                                        <option></option>
                                        @forelse($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label>District<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a district"
                                        id="edit-district_select" name="district">
                                        <option>{{ "Select State" }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 clearfix">
                                    <label>Mandal<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a Mandal"
                                        id="edit-mandal_select" name="mandal">
                                        <option>{{ "Select District" }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label>Village<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a village"
                                        id="edit-village_select" name="village">
                                        <option>{{ "Select Mandal" }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 clearfix">
                                    <label>Dealer<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a dealer"
                                        id="edit-dealer_select" name="dealer">
                                        <option>{{ "Select District" }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label>Crop<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a crop" id="edit-crop_select"
                                        name="crop">
                                        <option>Select Crop</option>
                                        @forelse($crops as $crop)
                                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group col-md-6 clearfix">
                                    <label>Assigned To<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a district"
                                        id="edit-salesman_select" name="salesman">
                                        <option>{{ "Select District" }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 report-filter">
                                    <label>FSA Type<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a Type" id="edit-fsa_select"
                                        name="fsa_type">
                                        <option value="">Select FSA Type</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label>Stage<sup class="text-danger">*</sup></label>
                                    <select class="form-control" data-placeholder="Select a stage"
                                        id="edit-stage_select" name="stage">
                                        @forelse($stages as $stage)
                                        <option value="{{ $stage->stage }}">{{ $stage->name }}</option>
                                        @empty
                                        <option>{{ __('validation.no_data') }}</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" class="btn green form-submit" data-loading-text="Updating..">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT MODAL -->

<!-- START EDIT MODAL -->
<div id="delete_modal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Are you sure want to delete?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" class="btn green form-submit" id="delete-ok" data-id=""
                    data-loading-text="Deleting..">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT MODAL -->