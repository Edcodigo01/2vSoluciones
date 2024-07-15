@extends("layoutsAdmin.index")
@section('title')
    Admin / Artículos
@endsection

@section("content")


    <div class="row">
        <div class="col-12">
            {{-- <div class="input-group float-right my-4" style="max-width:230px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-green">Estado: </span>
                </div>
                <select class="form-control" name="" id="filtro1">
                    <option value="no" selected>Todos</option>
                    <option value="si">Deshabilitados</option>
                </select>
            </div> --}}
            <h2 class="mb-4 text-">Artículos</h2>
        </div>
    </div>

    <table style="width:100%" class="listar table table-bordered table-striped listar" data-route="list_articles" data-update="articleUpdate/{id}" id="table-articles" data-routeEnable="enabled_article/{id}" data-routeDisable="disable_article/{id}" data-delete="{{url("administrar-articulos/{id}")}}">
        <thead>
            <tr>
                <th>Id</th>
                <th>Acciones:</th>
                <th>Título</th>
                <th>Autor</th>


            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

@include('articles.includes.modalCreate')
@include('articles.includes.modalEdit')
@include('articles.includes.modalEnable')
@include('articles.includes.modalDisabled')


{{-- clientes --}}
<input type="hidden" name="" value="{{$dataArticles}}" id="data">

<input type="hidden" name="" value="{{Auth::user()->nameComplete}}" id="userAuth">

@endsection

@section('scripts')
    <script type="text/javascript">
        function autorArticle(){
            value = $("#userAuth").val();
            $('.autorCreate').val(value);
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $(document).on("click", ".pagination a", function(e){
            e.preventDefault();
            showLoader();
            var url = $(this).attr('href');
            if(!url.includes('articulos_ajax')){
                url = url.replace('articulos','articulos_ajax');
            }
            ajaxArticles(url);
        });

        CKEDITOR.replace('contentCreate',
        {
            wordcount: {
                showCharCount: true,
                maxCharCount: 20000
            }
        });
        CKEDITOR.replace('content',
        {
            wordcount: {
                showCharCount: true,
                maxCharCount: 20000
            }
        });
    </script>
@endsection
