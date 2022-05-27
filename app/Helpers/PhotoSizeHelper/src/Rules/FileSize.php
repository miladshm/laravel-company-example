<?php

namespace App\Helpers\PhotoSizeHelper\src\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileSize implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private int $size = 2048
    )
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return filesize(public_path($value)) <= $this->size * 1024;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'حجم عکس بیشتر از '. $this->size/1024 . ' مگابایت می باشد';
    }
}
