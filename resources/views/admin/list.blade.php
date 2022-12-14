@extends('layouts.admin')
@section('title', 'The list of admins')

@section('content')

  {{-- Header --}}
  <x-header pageName="Admin" buttonValue="Admin">
    <x-slot name="table">
      <x-table :table="$adminTable" />
    </x-slot>
  </x-header>

  {{-- Insert --}}
  <x-insert size="modal-l" formId="adminForm">
    <x-slot name="content">
      {{-- Admin list --}}
      <div class="row">
        {{-- Name --}}
        <x-input size="12" key="name" name="Name" class="col-md-12 mb-3" />
        {{-- Email --}}
        <x-input size="12" key="email" name="Email" class="col-md-12 mb-3" />
        {{-- Passwords --}}
        <div class="col-md-12 mb-3">
          <label class="mb-2" for="password">New pssword:</label>
          <input type="password" name="password" id="password" class="form-control" 
                  placeholder="New password" autocomplete="new-password">
        </div>
        <div class="col-md-12 mb-3">
          <label class="mb-2" for="password-confirm">New password confirmation:</label>
          <input type="password" name="password-confirm" id="password-confirm" class="form-control" 
                  placeholder="New password confirmation" autocomplete="new-password">
        </div>
      </div>
    </x-slot>
  </x-insert>

  {{-- Delete --}}
  <x-delete title="Admin"/>

@endsection


@section('scripts')
  @parent

  {{-- Admin Table --}}
  {!! $adminTable->scripts() !!}

  <script>
    $(document).ready(function () {
      // Admin DataTable And Action Object
      let dt = window.LaravelDataTables['adminTable'];
      let action = new RequestHandler(dt,'#adminForm','admin');

      // Record modal
      $('#create_record').click(function () {
        action.openModal();
      });

      // Insert
      action.insert();

      // Delete
      window.showConfirmationModal = function showConfirmationModal(url) {
        action.delete(url);
      }
      
      // Edit
      window.showEditModal = function showEditModal(id) {
        edit(id);
      }
      function edit($id) {
        action.reloadModal();

        $.ajax({
          url: "{{ url('admin/edit') }}",
          method: "get",
          data: {id: $id},
          success: function(data) {
            console.log($id);
            action.editOnSuccess($id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#password').val('NewPassword');
            $('#password-confirm').val('NewPassword');
          }
        })
      }
    });
  </script>
@endsection
