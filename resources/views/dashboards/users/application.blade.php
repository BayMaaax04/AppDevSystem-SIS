@extends('layouts.app')

@section('title')
  PUP Student Portal | Application  
@endsection

@section('content')
<main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 mt-20">
    <header class="font-bold text-xl pb-2 block text-gray-800 dark:text-white mb-2 sm:mb-4 ">
        {{ __('Application Form') }}
    </header>
    <livewire:course-subject/>
</main>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('.courses').select2({
        minimumResultsForSearch: -1
      });
      $('#application_table').DataTable({
        searching: false, 
        paging: false, 
        info: false
      });

    });

    

    function getRow(n) {
        var row = n.parentNode.parentNode;
        var cols = row.getElementsByTagName("td");
        var i=0;
        while (i < cols.length) {
            // alert(cols[i].textContent);
            i++;
        }
    } 


  </script>
@endsection