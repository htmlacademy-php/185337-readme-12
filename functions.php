<?php

date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');

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
    $minute_interval = date_interval_create_from_date_string('60 minutes');
    $hour_interval = date_interval_create_from_date_string('24 hours');
    $day_interval = date_interval_create_from_date_string('7 days');
    $week_interval = date_interval_create_from_date_string('35 days');

    if (date_diff($post_date, $week_interval)) {
        echo $post_date;
    }
//    $date_now = new DateTime('now');
//    $date_post = $input_date;
//    print_r($date_now);
//    print_r($date_post);
//    $date_diff = date_diff(date_create($input_date), $date_now);
//    print_r($date_diff);
//    echo strtotime('7 days');
//    if ($date_diff < strtotime('7 days')) {
//        echo 'kek';
//    }
}

//function format_date(string $input_date): string
//{
//    $date_now = date_create();
//    $date_diff = date_diff(date_create($input_date), $date_now);
//
//    if(date_interval_format($date_diff, '%m') >= 1) {
//        if (date_interval_format($date_diff, '%a') >= 35) {
//            $time_count = date_interval_format($date_diff, '%m');
//            $time_text = get_noun_plural_form($time_count, 'месяц', 'месяца', 'месяцев');
//            return "$time_count $time_text назад";
//        }
//    }
//    if(date_interval_format($date_diff, '%a') >= 1) {
//        $time_count = date_interval_format($date_diff, '%a');
//        if ($time_count < 7) {
//            $time_text = get_noun_plural_form($time_count, 'день', 'дня', 'дней');
//            return "$time_count $time_text назад";
//        } elseif ($time_count < 35) {
//            $time_count = ceil($time_count / 7);
//            $time_text = get_noun_plural_form($time_count, 'неделя', 'недели', 'недель');
//            return "$time_count $time_text назад";
//        }
//    }
//    if(date_interval_format($date_diff, '%h') >= 1) {
//        $time_count = date_interval_format($date_diff, '%h');
//        $time_text = get_noun_plural_form($time_count, 'час', 'часа', 'часов');
//        return "$time_count $time_text назад";
//    }
//    if(date_interval_format($date_diff, '%i') >= 1) {
//        $time_count = date_interval_format($date_diff, '%i');
//        $time_text = get_noun_plural_form($time_count, 'минута', 'минуты', 'минут');
//        return "$time_count $time_text назад";
//    }
//
//    return "менее минуты назад";
//}
