<div class="flex-shrink-0">
    <div class="max-w-6xl mx-auto">
        <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark ">
            <select wire:model="selectedCourse" class="form-control">
              <option selected value="disabled">Select a course</option>
              @foreach ($courses as $course)
                <option value={{$course->id}} data-dependent="{{$course->course_title}}">{{$course->course_title}}</option>
              @endforeach

            </select>
            <table id="application_table"  class="pb-4/12" style="width:100%; height: 70%;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Unit</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody class="course_body">
                  
                    @forelse($subjects as $subject)
                    <tr>
                    <td><input type="checkbox" onclick="getRow(this)" name="subjects[]" /></td>
                      <td> {{ $subject->subject_abbreviation}} </td>
                      <td> {{ $subject->subject_title}} </td>
                      <td> {{ $subject->subject_unit}} </td>
                      <td> {{ $subject->subject_description}} </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center"> No Subjects Found</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
           
            <div class="flex items-center justify-end">
                <a href="{{ route('user.submitapplication')}}"><button type="submit"
                class=" relative inline-block overflow-hidden mt-1 p-2 w-40 border-none rounded-lg bg-red-accent text-white outline-none cursor-pointer transition hover:bg-red-800" id="registernowBtn">
                    {{ __('Submit Form') }}
                </button>
            </a>
            </div>
        </section>
    </div>
</div>
