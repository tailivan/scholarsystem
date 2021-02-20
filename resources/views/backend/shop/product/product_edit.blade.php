@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">
               
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Mettre à jour un produit</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST"  action="{{ route('product.update', $editData->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                                   
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Nom<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  value="{{ $editData->name }}" class="form-control"> 
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Prix<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" name="price"  value="{{ $editData->price }}" class="form-control"> 
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Catégorie <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Catégorie</option>
                                                    @foreach($cat as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Sous catégorie <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="" required="" class="form-control">
                                               
                                                
                                                
                                            </select>
                                        
                                    </div> 
                                    </div> 
                                    </div>
                                  </div>
                                 

                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                             <textarea name="description"  class="form-control summernote" rows="12">{{ $editData->description }} </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Infos<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                             <textarea name="additional_info" id="" class="form-control summernote"  rows="12">{{ $editData->additional_info }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                  </div>

                                  <div class="row">
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"  class="form-control"> 
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="controls">
                                                <img id="showImage"
                                                    src="{{ (!empty($editData->image))? url('upload/product_image/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                    style="width: 100px; height: 100px; border: 2px solid #000"
                                                    alt="User Avatar">
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                    
                                        
                                        

                                        

   
                                        
                                   <div class="text-xs-right"></div>
                                   <input type="submit" class="btn btn-rounded btn-info" value="Mettre à jour">
                            </form>
       
                       </div>
                       <!-- /.col -->
                     </div>
                     <!-- /.row -->
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
       
               </section>

            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>

    $("document").ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var catID = $(this).val();
            if(catID)
            {
                $.ajax({

                    url : '/shop/subcategories/' + catID,
                    type : "GET",
                    dataType : 'json',
                    success : function(data){
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append(
                                '<option value ="'+key+'">' +value+
                                '</option'
                            );

                        });
                    }

                });
            }else{
                $('select[name="subcategory_id"]').empty();
            }
        });

    });
</script>
@endsection
