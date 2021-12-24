<?php
function cut_text(string $input_string, int $characters_count = 300): string
{
    if (strlen($input_string) < $characters_count) {
        $output_string = '<p>' . htmlspecialchars($input_string) . '</p>';
    } else {
        $input_string_array = explode(' ', $input_string);
        $result_array = [];
        $result_characters_count = mb_strlen($input_string_array[0]) + 1;
        for ($i = 0; $result_characters_count <= $characters_count; $i += 1) {
            $result_array[] = $input_string_array[$i];
            $result_characters_count += mb_strlen($input_string_array[$i + 1]) + 1;
        }
        $output_string = implode(' ', $result_array);
        $output_string = '<p>' . htmlspecialchars($output_string) . '...</p>';
        $output_string .= '<a class="post-text__more-link" href="#">Читать далее</a>';
    }
    return $output_string;
}
