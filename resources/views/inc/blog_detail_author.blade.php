            <div class="blog-details-author">
                    <div class="blog-details-author-thumb">
                        <img src="{{asset('app/img/blog-details-author.png')}}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$single_post->user->name}}</h5>
                        </div>
                        <p class="text">{{$single_post->user->profile ? $single_post->user->profile->about : ''}}
                        </p>
                        <div class="socials">

                            <a href="{{$single_post->user->profile ? $single_post->user->profile->facebook : ''}}" class="social__item" target="_blank">
                                @if($single_post->user->profile)
                                <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                @endif
                            </a>

                            <a href="{{$single_post->user->profile ? $single_post->user->profile->youtube : ''}}" class="social__item" target="_blank">
                                @if($single_post->user->profile)
                                <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>