@extends("layoutsAdmin.index")
@section('title')
  2V-Admin-Videos
@endsection
@section("content")
    <div class="" id="scrollPaginate">

    </div>
    <div class="row">
        <div class="col-12">
            <button type="button" name="button" class="btn btn-primary float-right mt-4" onclick="showModal('#modalCreate','#uploadVideo')"><i class="fas fa-plus"></i> Nuevo</button>
            <h2 class="mb-4 text-">Videos</h2>
        </div>
    </div>

    <div class=" mt-4">
        <div class="viewAjax" data-route="{{route('list_videos')}}">
            @include('videos.videos_ajax')


            </div>
    </div>

        <input type="hidden" name="" value="{{url()->current()}}" id="urlNow">
        <input type="hidden" name="" value="" id="urlNow">
    @include('videos.includes.modalCreate')
    @include('videos.includes.modalEdit')
    @include('layouts.modalsGlobal.modalVideoFront')
    @include('videos.includes.modalDeleteAJAX')


    {{-- <input type="hidden" name="" value="{{$dataTags}}" id="data"> --}}
@endsection
@section('scripts')
    <script type="text/javascript">

    $(document).on("click", ".pagination a", function(e){
        e.preventDefault();
        showLoader();
        var url = $(this).attr('href');
        if(!url.includes('list_videos')){
            url = url.replace('administrar-videos','list_videos');
        }
        viewAjax('.viewAjax',url);

        $('html, body').animate({
            scrollTop: $("#scrollPaginate").offset().top
        }, 500);

    });

    function showModalEdit(btn){
        card = $(btn).parents('.contentInput');
        title = $(card).find('.title').val();
        url = $(card).find('.url').val();
        url = 'https://www.youtube.com/watch?v='+url;
        // url = url.replace('embed/','watch?v=');
        description = $(card).find('.description').val();
        id = $(card).find('.vide_id').val();
        $('#title').val(title);
        $('#url').val(url);
        $('#description').val(description);
        $('#update_ajax').attr('action','administrar-videos/'+id);
        $('#modalEdit').modal('show');
    }



    </script>
@endsection
