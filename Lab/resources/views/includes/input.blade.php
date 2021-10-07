<strong>
    <label for="{{ $fieldId }}">{{ $labelText }}</label>
</strong>                  
<input type="text" 
id = "{{ $fieldId }}" 
name="{{ $fieldName }}" 
value="{{ old($fieldId) ? old($fieldName) : $value }}"
                   
class = "form-control {{ $errors->has($fieldId) ? 'is-invalid':'' }}" 
placeholder="{{ $placeHolderText }}" >

@include('includes/validationError', ['errorFieldName' => $fieldId])

