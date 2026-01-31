@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">Packages</h4>
        <a href="{{ route('admin.dashboard.packages.create') }}" class="btn btn-primary">Add New Package</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Packages List</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.packages.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">Add</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="example1"></label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 142.24px;">ID</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 142.24px;">name</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 142.24px;">Price</th>
{{--                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Discounted Price: activate to sort column ascending" style="width: 142.24px;">Discounted Price</th>--}}
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hours: activate to sort column ascending" style="width: 142.24px;">Hours</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 142.24px;">Category</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car: activate to sort column ascending" style="width: 142.24px;">Car</th>
                                        <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 263.789px;">Actions</th>
                                        <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 263.789px;">الظهور</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($packages as $package)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $package->id }}</td>
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->price }}</td>
{{--                                            <td>{{ $package->discounted_price }}</td>--}}
                                            <td>{{ $package->hours }}</td>
                                            <td>{{ $package->category ? $package->category->name_ar : 'غير محدد' }}</td>
                                            <td>{{ $package->car->size }}</td>
                                            <td>
                                                <a class="dropdown-item" href="{{ route('admin.dashboard.packages.edit', $package->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.dashboard.packages.destroy', $package->id) }}" method="post" style="display:inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">
                                                        <i class="bx bx-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
    <input type="checkbox" class="toggle-switch" data-id="{{ $package->id }}" {{ $package->active ? 'checked' : '' }}>
</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="floatingAlert" class="floating-alert">
            <span id="floatingAlertMessage"></span>
            <span class="check-icon">&#10003;</span> <!-- علامة صح -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        function showAlert(message) {
            var alertBox = document.getElementById('floatingAlert');
            var alertMessage = document.getElementById('floatingAlertMessage');
            alertMessage.textContent = message;
            alertBox.style.display = 'flex'; // عرض الرسالة كـ flexbox لمركز المحتوى عمودياً
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 5000);
        }

        function closeAlert() {
            document.getElementById('floatingAlert').style.display = 'none';
        }

        // إذا كانت هناك رسالة نجاح في الجلسة
        @if (session('success'))
        showAlert("{{ session('success') }}");
        @endif
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.toggle-switch').on('change', function () {
            var packageId = $(this).data('id');
            var isActive = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.dashboard.packages.toggleActive') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: packageId,
                    active: isActive
                },
                success: function (response) {
                    showAlert(response.message);
                },
                error: function () {
                    showAlert("حدث خطأ أثناء التحديث!");
                }
            });
        });
    });
</script>

@endsection
