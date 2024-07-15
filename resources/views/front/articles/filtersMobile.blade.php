<div id="filtersMobile" class="mt-1">
   <div class="row">
       <div class="col-12">
           <a class="btnCloseFilterMobile float-right mr-2"> <i class="fas fa-times"></i> </a>
       </div>
   </div>

   <div class="card">
        <div class="card-body">
           <h6 class="text-green-l"> Filtros</h6>
           <form  class="" action="{{url('articulos')}}" method="get" id="formSearchPost">

              <div class="row">
                 <div class="col-12">
                     <label for="">Título del artículo</label>
                     <input type="text" name="titulo" value="{{request()->titulo}}" class="form-control form-control-sm">
                 </div>
                 <div class="col-12">
                     @if ($categories->first() != Null)
                         <label for="">Categoría</label>
                         <select class="form-control form-control-sm" name="categoria" >
                             @if(request()->categoria == Null)
                                 <option value="" selected class="">Todas</option>
                                 @foreach ($categories as $key => $value)
                                     <option  value="{{$value->name}}" class="">{{$value->name}}</option>
                                 @endforeach
                             @else

                                 <option value="" class="">Todas</option>
                                 @foreach ($categories as $key => $value)
                                     @if (request()->categoria == $value->name)
                                         <option class="" value="{{$value->name}}" selected>{{$value->name}}</option>
                                     @else
                                         <option class="" value="{{$value->name}}" >{{$value->name}}</option>
                                     @endif
                                 @endforeach

                             @endif
                         </select>

                     @endif
                 </div>
             <div class="col-12">
                @if (request()->titulo or request()->categoria)
                   <a href="{{url('articulos')}}" type="button" name="button" class="ml-1 btn btn-purple text-white mt-2 float-right" style=""><i class="fas fa-backspace"></i> </a>
                @endif

                 <button  type="submit" name="button" class="btn btn-purple mt-2 float-right" ><i class="fas fa-search ml-1"></i> Buscar</button>
             </div>
             </div>
           </form>
        </div>

   </div>

   @if($categories->first() != Null)
        <div class="card mt-2">
            <div class="card-body">
               <h6 class="text-green-l"> Categorías</h6>
               <input type="hidden" name="" value="{{$number = 0}}">
               @foreach ($categories as $key => $category)

                  <input type="hidden" name="hidden" value="{{$number = $number + 1}}" >
                  <hr style="margin:0px;padding:0px">

                  <div class="searchCategory" data-val="{{$category->name}}">
                       <span class="font600">{{$category->name}} </span><span class="bg-green-l float-right text-center" style="border-radius:20px;width:20px">{{$category->articles->where('disabled','no')->count()}}</span>
                  </div>
                  <hr style="margin:0px;padding:0px">
               @endforeach
               <div class="searchCategory" id="todos" data-val="">
                  <span class="font600">Todas </span><span class="bg-green-l float-right text-center" style="border-radius:20px;width:20px">{{$articles->where('disabled','no')->count()}}</span>
               </div>

            </div>
        </div>
   @endif
</div>
