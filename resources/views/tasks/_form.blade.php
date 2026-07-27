<div class="mb-3">
    <label for="title" class="form-label">Названние задачи</label>
    
    <input 
    type="text"
    name="title"
    id="title"
    class="form-control
    @error('ti')">
    <!--!!!-->    

    @error('title')
    <div class="invalid-deedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descriotion" class="form-label">Описание</label>
    <textarea id="descriotion"
    name="descriotion"
    class="form-control @error('descriotion') is-invalid @"></textarea>  
      <!--!!!-->    

</div>


<div class="row">
    <div class="col-md-6 mb-3">
        <label for="status" id="status"
        class="form-select @error('status') is-invalid @enderror" require></label>
            <!--!!!-->    

    </div>
</div>
<!--!!!-->    

