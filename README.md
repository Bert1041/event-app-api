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

A one-to-many relationship is used to define relationships where a single model is the parent to one or more child models.

- A user can have many events so the hasMany() relationship is used in the user model
- A ticket belongs both to a user and an event so the belongsTo() method is used to define the relationships
- An event can have many tickets but only belong to a user so here both the hasMany() and belongsTo() methods are used
