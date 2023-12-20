@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500
    focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="images/man.png">
        {{ __('Man profile') }}
    </option>
    <option value="images/man-1.png">
        {{ __('Man profile 1') }}
    </option>
    <option value="images/man-2.png">
        {{ __('Man profile 2') }}
    </option>
    <option value="images/woman.png">
        {{ __('Woman profile') }}
    </option>
    <option value="images/woman-1.png">
        {{ __('Woman profile 1') }}
    </option>
    <option value="images/woman-2.png">
        {{ __('Woman profile 2') }}
    </option>
</select>
