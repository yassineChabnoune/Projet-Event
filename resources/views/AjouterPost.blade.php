@extends('layout')
@section("content")
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ url('/AjouterPost') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <div class="card">
                        <div class="container">
                            <br>
                            <label class="label-din" for="">Title</label>
                            <input id="title" type="text" name="title" class="form-control" placeholder="title"
                                value="{{old('title')}}">
                            <br>
                            <label class="label-din" for="">Discription</label>
                            <textarea id="desc" name="disc" class="form-control" placeholder="Description"
                                value="erfgqergeq"></textarea>
                            <!--                         <br>
                        <label class="label-din" for="">Nom de l'Utilisateur</label> -->
                            <input id="user" type="hidden" value="{{ Auth::user()->name }}" name="user_name"
                                class="form-control" placeholder="user name">
                            <br>
                            <label class="label-din" for="">Categorie</label>
                            <select name="category_name" class="form-control" id="category">
                                <option id="category" value="Sience">Sience </option>
                                <option id="category" value="MUSIC">MUSIC </option>
                                <option id="category" value="Art">Art </option>
                                <option id="category" value="Sports">Sports </option>
                                <option id="category" value="Party">Party </option>
                                <option id="category" value="Other">Other </option>
                            </select>
                            <br>
                            <label class="label-din">Post Image </label>
                            <input id="fileAddPost" type="file" name="image_post" class="form-control"
                                value="{{('image_post')}}">
                            <div class="btn">
                                <input type="submit" value="Save" class="btn-ajouter">
                            </div>
                        </div>
                    </div>

                </div>
        </div>
        <div class="col-12">
            @foreach($errors->all() as $err)
            <div class="alert alert-danger mt-5">
                {{$err}}
            </div>
            @endforeach
        </div>
        </form>
    </div>
</div>
</div>
@endsection("content")