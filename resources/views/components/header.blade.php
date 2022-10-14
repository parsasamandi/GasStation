<div class="container-fluid mt-3">
    {{-- Page Name --}}
    <h1 class="mt-4">{{ $pageName }}</h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}" class="active">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $pageName }} list</li>
    </ol>

    {{-- Button --}}
    <button type="button" id="create_record"
        class="btn primary_color btn-sm mb-2">Add {{ $pageName }}</button>

    {{-- Responsive Table --}}
    <div class="table-responsive">
        {{ $table }}
    </div>
</div>
