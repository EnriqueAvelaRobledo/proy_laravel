@csrf
<label for="">Titulo</label>
<input type="text" class="form-control" name="title" value="{{old("title", $post->title)}}">

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" value="{{old("slug",$post->slug)}}">

<label >Categoria</label>
<select  class="form-control" name="category_id">
    <option value=""></option>
    @foreach ($categories as $title => $id)
    <option {{old("category_id", $post->category_id) == $id ? "selected" : ""}} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label >Posteado</label>
<select  class="form-control" name="posted">
    <option {{old("posted",$post->posted) == "no" ? "selected" : ""}} value="Not">No</option>
    <option {{old("posted",$post->posted) == "yes" ? "selected" : ""}} value="Yes">Si</option>
</select>

<label for="">Contenido</label>
<textarea   class="form-control" name="content">  {{old("content", $post->content)}}</textarea>

<label for="">Descripcion</label>
<textarea  class="form-control" name="description"> {{old("description",$post->description)}} </textarea>

@if (@isset($task) && $task == "edit")

<label  class="form-control" for="">Imagen</label>
<input type="file" name="image">

@endif
<br>
<button type="submit" class="btn btn-success mt-4">Enviar</button>


