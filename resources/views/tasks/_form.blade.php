<div class="mb-3">
    <label for="title" class="form-label">Название задачи</label>
    <input
        type="text"
        name="title"
        id="title"
        class="form-control
            @error('title') is-invalid @enderror"
        value="{{ old('title', $task->title) }}"
        maxlength="255"
        require>

    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea
        name="description"
        id="description"
        class="form-control
            @error('description') is-invalid @enderror">
        {{ old('description', $task->description) }}"
    </textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="status" class="form-label">Статус</label>
        <select name="status" id="status"
            class="form-select @error('status') is-invalid @enderror" require>
            @foreach ($statuses as $value => $label)
            <option 
                value="{{ $value }}"
                @selected(
                    old(
                        'status',
                        $task->status ?: 'new'
                    ) === $value
                )
            >
                {{ $label }}
            </option>
            @endforeach
        </select>

        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="col-md-6 mb-3">
        <label for="deadline" class="form-label">Срок выполнения</label>
        <input
            id="deadline"
            type="date"
            name="deadline"
            value="{{ old(
                'deadline',
                $task->deadline?->format('Y-m-d')
            ) }}"
            class="form-control @error('deadline') is-invalid @enderror">

        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    </div>
</div>