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

function format_date(string $input_date): string
{
    $post_date = date_create($input_date);
    $time_interval = date_diff(date_create($input_date), date_create());

    if ($post_date < date_create('-5 weeks')) {
        $time_count = date_interval_format($time_interval, '%m');
        $time_text = get_noun_plural_form($time_count, 'месяц', 'месяца', 'месяцев');
        return "$time_count $time_text назад";
    }
    if ($post_date < date_create('-7 days')) {
        $time_count = floor(date_interval_format($time_interval, '%a') / 7);
        $time_text = get_noun_plural_form($time_count, 'неделя', 'недели', 'недель');
        return "$time_count $time_text назад";
    }
    if ($post_date < date_create('-1 day')) {
        $time_count = date_interval_format($time_interval, '%a');
        $time_text = get_noun_plural_form($time_count, 'день', 'дня', 'дней');
        return "$time_count $time_text назад";
    }
    if ($post_date < date_create('-1 hours')) {
        $time_count = date_interval_format($time_interval, '%h');
        $time_text = get_noun_plural_form($time_count, 'час', 'часа', 'часов');
        return "$time_count $time_text назад";
    }
    if ($post_date > date_create('-60 mitunes')) {
        $time_count = date_interval_format($time_interval, '%i');
        $time_text = get_noun_plural_form($time_count, 'минута', 'минуты', 'минут');
        return "$time_count $time_text назад";
    }

    return "менее минуты назад";
}
