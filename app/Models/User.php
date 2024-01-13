<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'username',
        'about_me',
        'email',
        'password',
        'role_id',
        'profile_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function userToForum(){
        return $this->hasMany(User::class,'id','user_id');
    }

    public function UserTosidebarProgress(){
        return $this->hasMany(UserSidebarProgress::class,'user_id','id');
    }

    public function userToTransaction(){
        return $this->hasMany(Transaction::class, 'user_id','id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function isReadyForFinal($courseId)
    {
        $enrollment = $this->enrollments->where('course_id', $courseId)->first();
        return $enrollment && $enrollment->ready_for_final;
    }

    public function userCourseDetail() {
        return $this->hasMany(userCourseDetail::class);
    }

    public function isEnrolled($courseId)
    {
        return $this->enrollments->contains('course_id', $courseId);
    }

    public function hasCompletedCourse($courseId)
    {
        $enrollment = $this->enrollments->where('course_id', $courseId)->first();

        return $enrollment && $enrollment->ready_for_final && $enrollment->completed;
    }

    public function updateTimestampForCourse($courseId)
    {
        $enrollment = $this->enrollments()->where('course_id', $courseId)->first();

        if ($enrollment) {
            $course = $enrollment->course;

            if ($course) {
                return $course->updated_at->format('Y-m-d');
            }
        }

        return null; // Course not found or not enrolled
    }


    public function registerCertifications()
    {
        return $this->hasMany(RegistrationCertification::class);
    }

    public function isRegistered($certif_id)
    {
        return $this->registerCertifications->contains('certif_id', $certif_id);
    }

    public function hasPassedCerification($certif_id)
    {
        $certification = $this->registerCertifications->where('certif_id', $certif_id)->first();

        return $certification && $certification->passed;
    }

    public function materialComplete(){
        return $this->hasMany(MaterialCompleted::class);
    }
}
