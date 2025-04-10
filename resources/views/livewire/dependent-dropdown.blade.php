<div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
    <div class="mb-4">
        <label for="province_id" class="inline-block mb-2 text-base font-medium">
            Province <span class="text-red-500">*</span>
        </label>
        <select wire:model.live="selectedProvince"
            class="form-select border-slate-200 dark:border-zink-500 
        focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
        dark:disabled:bg-zink-600 disabled:border-slate-300 
        dark:disabled:border-zink-500 dark:disabled:text-zink-200
        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
        dark:focus:border-custom-800 placeholder:text-slate-400
        dark:placeholder:text-zink-200"
            id="province_id" name="province_id">
            <option >Choose...</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}" {{old('province_id',$student->province_id) == $province->id ? 'selected':''}}>{{ $province->province_en }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="district_id" class="inline-block mb-2 text-base font-medium">
            District <span class="text-red-500">*</span>
        </label>
        <select wire:model.live="selectedDistrict"
            class="form-select border-slate-200 dark:border-zink-500 
        focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
        dark:disabled:bg-zink-600 disabled:border-slate-300 
        dark:disabled:border-zink-500 dark:disabled:text-zink-200
        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
        dark:focus:border-custom-800 placeholder:text-slate-400
        dark:placeholder:text-zink-200"
            id="district_id" name="district_id">
            <option >Choose...</option>
            @if ($districts)
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}"{{old('district_id',$student->district_id) == $district->id ? 'selected':''}}>{{ $district->district_en }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mb-4">
        <label for="local_body_id" class="inline-block mb-2 text-base font-medium">
            Local Body <span class="text-red-500">*</span>
        </label>
        <select wire:model.live="selectedLocalBody"
            class="form-select border-slate-200 dark:border-zink-500 
        focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
        dark:disabled:bg-zink-600 disabled:border-slate-300 
        dark:disabled:border-zink-500 dark:disabled:text-zink-200
        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
        dark:focus:border-custom-800 placeholder:text-slate-400
        dark:placeholder:text-zink-200"
            id="local_body_id" name="local_body_id">
            <option >Choose...</option>
            @if ($localBodies)
                @foreach ($localBodies as $localBody)
                    <option value="{{ $localBody->id }}"{{old('local_body_id',$student->local_body_id) == $localBody->id ? 'selected':''}}>{{ $localBody->local_body_en }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mb-4">
        <label for="local_body_id" class="inline-block mb-2 text-base font-medium">
            Ward <span class="text-red-500">*</span>
        </label>
        <select
            class="form-select border-slate-200 dark:border-zink-500 
        focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
        dark:disabled:bg-zink-600 disabled:border-slate-300 
        dark:disabled:border-zink-500 dark:disabled:text-zink-200
        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
        dark:focus:border-custom-800 placeholder:text-slate-400
        dark:placeholder:text-zink-200"
            id="ward_no" name="ward_no">
            <option selected="" disabled="" value="">Choose...</option>
            @if ($wards)
                @for ($ward = 1; $ward <= $wards; $ward++)
                    <option value="{{ $ward }}" {{ old('ward_no',$student->ward_no) == $ward ? 'selected' : '' }}>
                        {{ $ward }}
                    </option>
                @endfor
            @endif
        </select>
    </div>
    
</div>
