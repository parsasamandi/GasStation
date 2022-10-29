@extends('layouts.admin')
@section('title', 'The list of reservations')

@section('content')
  {{-- Header --}}
  <x-header pageName="Reservation" buttonValue="reservation">
    <x-slot name="table">
      <x-table :table="$reservationTable" />
    </x-slot>
  </x-header>

  {{-- Insert --}}
  <x-insert size="modal-l" formId="reservationForm">
    <x-slot name="content">
      {{-- User form --}}
      <div class="row">
        {{-- User's name --}}
        <x-input key="name" name="User's name" class="col-md-12 mb-2" />
        {{-- Time --}}
        <x-input key="time" name="Time" class="col-md-12 mb-2" />
        {{-- Factor --}}
        <x-input key="factor" name="Factor" class="col-md-12 mb-3" />
      </div>
    </x-slot>
  </x-insert>
  
  {{-- Delete --}}
  <x-delete title="reservation"/>
  
@endsection


@section('scripts')
  @parent

  {{-- Reservation table --}}
  {!! $reservationTable->scripts() !!}

  <script>
    $(document).ready(function () {
      // Reservation dataTable And action object
      let dt = window.LaravelDataTables['reservationTable'];
      let action = new RequestHandler(dt,'#reservationForm','reservation');

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
          url: "{{ url('reservation/edit') }}",
          method: "get",
          data: {id: $id},
          success: function(data) {
            action.editOnSuccess($id);
            $('#time').val(data.time);
            $('#factor').val(data.factor);
          }
        })
      }
    });
  </script>
@endsection
