@extends('layouts.admin')
@section('header','Authors')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
@role('admin')        
<div id="controller">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add New Author</a>
                        </div>
        
                        <div class="card-body" p-0>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="15px">Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                            <div class="modal-header">

                                <h4 class="modal-title">Author</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" :value="data.name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" :value="data.email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone_number" :value="data.phone_number" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="string" class="form-control" name="address" :value="data.address" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                  
                </div>
                
              
            </div>
</div> 
@endrole   
@endsection

@section('js')

<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
    var actionUrl = "{{ url('authors') }}";
    var actionapi = "{{ url('api/authors') }}";

    var columns = [
        
        { data: 'DT_RowIndex', class: 'text-center', orderable: true },
        { data: 'name', class: 'text-left', orderable: true },
        { data: 'email', class: 'text-left', orderable: false},
        { data: 'phone_number', class: 'text-center', orderable: false },
        { data: 'address', class: 'text-left', orderable: false },
        { data: 'date', class: 'text-center', orderable: false },
        {
            render: function (index, row, data, meta) {
                return `
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event,${data.id})">Delete</a>
                `;
            },
            orderable: false,width: '200px', class: 'text-center' },
    ];

    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [],
            data: {},
            actionUrl: actionUrl,
            apiUrl: actionapi,
            editStatus: false
        },
        mounted: function () {
            this.datatable();
        },
        methods: {
            datatable: function () {
                var _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET'
                    },
                    columns: columns
                }).on('xhr', function () {
                    _this.datas = _this.table.ajax.json().data;
                });
                },
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('authors') }}';
                    this.editStatus = false ;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true ;
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if(confirm("Are you sure ?")){
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            alert('Data has been remove');
                        }); 
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => 
                       {$('#modal-default').modal('hide');
                     _this.table.ajax.reload();
                    })

                }

        }
    });
</script>

<script>
    $(function () {
      $("#datatable").DataTable();
})
   
  </script>
@endsection