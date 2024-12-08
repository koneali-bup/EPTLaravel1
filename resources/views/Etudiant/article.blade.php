@extends('layouts.app')

@section('titre')
    <title>article</title>
@endsection

@section('content')
<form method="post" action="{{ route('articles.store') }}" class="w-100">
    <div class="px-4 w-100">
      <div class="row mb-2 ">

        <div class="col-lg-12">
          <div class="form-group">
            <label for="nomArticle">nomArticle</label>
            <input type="text" class="form-control" id="studentNumber" name="name" value="" required>
          </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
              <label for="prixArticle">prixArticle</label>
              <input type="text" class="form-control" id="studentNumber" name="price" value="" required>
            </div>
        </div>   

        <div class="col-lg-12">
            <div class="form-group">
              <label for="quantiteArticle">quantiteArticle</label>
              <input type="text" class="form-control" id="studentNumber" name="quantity" value="" required>
            </div>
          </div>        
        
       </div> 
    </div> 

    <div>
        <button type="submit" class="btn btn-primary btn-pill">Ajouter</button>
    </div>
 
</form>
    
@endsection