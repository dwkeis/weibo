<a href="#">
  <strong id="following" class="stat">
    {{ count($user->followings) }}
  </strong>
  Following
</a>
<a href="#">
  <strong id="followers" class="stat">
    {{ count($user->followers) }}
  </strong>
  Follower
</a>
<a href="#">
  <strong id="statuses" class="stat">
    {{ $user->statuses()->count() }}
  </strong>
  WeiBo
</a>