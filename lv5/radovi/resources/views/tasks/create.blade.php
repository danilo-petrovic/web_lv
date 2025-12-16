LOCALE: {{ app()->getLocale() }}
<hr>


<h1>{{ __('tasks.add_task') }}</h1>

<a href="/lang/hr">{{ __('tasks.lang_hr') }}</a> |
<a href="/lang/en">{{ __('tasks.lang_en') }}</a>

<hr>

<form method="POST" action="/nastavnik/radovi">
    @csrf

    <label>{{ __('tasks.title_hr') }}</label><br>
    <input type="text" name="title_hr"><br><br>

    <label>{{ __('tasks.title_en') }}</label><br>
    <input type="text" name="title_en"><br><br>

    <label>{{ __('tasks.description') }}</label><br>
    <textarea name="description"></textarea><br><br>

    <label>{{ __('tasks.study_type') }}</label><br>
    <select name="study_type">
        <option value="stručni">stručni</option>
        <option value="preddiplomski">preddiplomski</option>
        <option value="diplomski">diplomski</option>
    </select><br><br>

    <button type="submit">{{ __('tasks.save') }}</button>
</form>
