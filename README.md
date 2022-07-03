## Event Ticketiing Apllication

### Database Structure

#### users table

| users      | 
| -----------|

| id          | bigint(20) unsigned |
| ----------- | ------------------- |
| name        | varchar(255)        |
| email       | varchar(255)	    |
| created_at  | timestamp	        |
| updated_at  | timestamp	        |


#### events table

| events      | 
| -----------|

| id          | bigint(20) unsigned |
| ----------- | ------------------- |
| user_id     | bigint(20) unsigned |
| title       | varchar(255)	    |
| description | longtext	        |
| event_date   | varchar(255)	    |
| is_active   | enum	            |
| access      | enum	            |
| created_at  | timestamp	        |
| updated_at  | timestamp	        |


#### tickets table

| tickets      | 
| -----------|

| id          | bigint(20) unsigned |
| ----------- | ------------------- |
| user_id     | bigint(20) unsigned |
| event_id    | bigint(20) unsigned |
| is_valid    | enum	            |
| created_at  | timestamp	        |
| updated_at  | timestamp	        |


#### users model constraints
```laravel
  public function events()
    {
        return $this->hasMany(Event::class);
    }
```

#### tickets model constraints
```laravel

 public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
      {
        return $this->belongsTo(User::class);
    }
```
#### events model constraints
```laravel

      public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function event()
    {
        return $this->belongsTo(User::class);
    }
```
Blog Post has multiple comments. So we can define the function as comments, and also, we can associate with hasMany(). Eloquent will automatically determine the proper foreign key column on the Commentmodel.
Laravel is a web applic

- A user can have many events so the hasMany() relationship is used in the user model
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

