

<div class="form-group">
    <label for="question-title"> Post title</label>
    <input type="text" name="title" value="{{old('title',$post->title)}}" id="question-title" class="form-control {{$errors->has('title')?'is-invalid':'' }}">

    @if($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif

</div>

<div class="form-group">
    <label for="question-body"> Body for post</label>
    <textarea name="body" id="question-body" rows="10" class="form-control {{$errors->has('body')? 'is-invalid':'' }}">{{old('body',$post->body)}}</textarea>
    @if($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('body')}}</strong>
        </div>
    @endif

</div>
<div class="form-group">
    <label for="exampleInputFile">Лицевая картинка</label>
    <input type="file" name="image" id="exampleInputFile">

    <span><img src="{{$post->getImage()}}" alt="" style="width: 150px;"></span>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">
        {{$buttonText}}
    </button>
</div>
