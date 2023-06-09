@extends('layouts.app')

@section('content')

@section('title')
    <title>İcazə</title>
@endsection

<div>
    <div>
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="role-title">İcazə ver ({{ $user->name }})</h3>
                    <input type="checkbox" name="checkAll" {{ $user->hasRole(['publisher','destroyer','editor,']) ? 'checked' : '' }} id="checkAll" class="form-check-input" />
                    <label class="form-check-label" for="checkAll">
                        Hamsını seç
                    </label>
                </div>
                <form action="{{ route('permission.storeRole') }}" 
                    method="POST" id="addRoleForm" class="row g-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input type="checkbox" name="role[]" {{ $user->hasRole('publisher') ? 'checked' : '' }} value="1" class="form-check-input" id="publisher" />
                                                    <label class="form-check-label" for="publisher">
                                                        Məlumat daxil etmə
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input type="checkbox" name="role[]" {{ $user->hasRole('editor') ? 'checked' : '' }} value="2" class="form-check-input" id="editor" />
                                                    <label class="form-check-label" for="editor">
                                                        Redaktə
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input type="checkbox" name="role[]" {{ $user->hasRole('destroyer') ? 'checked' : '' }} value="3" class="form-check-input" id="destroyer" />
                                                    <label class="form-check-label" for="destroyer">
                                                        Silmə
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">
                            Təsdiqlə</button>
                        <a href="{{ route('permission.index') }}" class="btn btn-label-secondary">
                            Ləğv et
                        </a>
                    </div>
                </form>
                <script>
                    $('#checkAll').click(function() {
                        $('input[type=checkbox]').prop('checked', this.checked);
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->
@endsection
