<?php

namespace App\Helpers\PhotoSizeHelper\src\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageSize implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private string $width,
        private string $height
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
        $is_readable = \File::isFile(public_path($value));
        $file_size_is_valid = filesize(public_path($value)) <= 2 * 1024 * 1024;
        if (!($is_readable && $file_size_is_valid)) {
            return false;
        }
        $photo = getimagesize(public_path($value));

        if (!$photo) {
            return false;
        } else {
            $photo_width = $photo[0];
            $photo_height = $photo[1];
            $photo_constraint = round($photo_width / $photo_height,2);
            $constraint = round($this->width / $this->height,2);
            return $photo_constraint == $constraint;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'رزولوشن تصویر صحیح نمی باشد!';
    }
}
