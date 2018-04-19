<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="c-graph-card">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">Next Payout</h3>
                    <p class="c-graph-card__date">Activity from 4 Jan 2017 to 10 Jan 2017</p>
                    <h4 class="c-graph-card__number">$2,190</h4>
                    <p class="c-graph-card__status">You’ve made $230 Today</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-payout" width="300" height="74"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="c-graph-card">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">Total Earnings</h3>
                    <p class="c-graph-card__date">In 15 Months</p>
                    <h4 class="c-graph-card__number">$23,580</h4>
                    <p class="c-graph-card__status">Last Month you’ve made $2,980</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-earnings" width="300" height="74"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="c-progress-card">
                <h3 class="c-progress-card__title">All Tasks Overview</h3>
                <p class="c-progress-card__date">Next 4 Weeks</p>

                <div class="c-progress-card__item">
                    <div class="c-progress-card__label">Week 3</div>

                    <div class="c-progress-card__progress c-progress c-progress--small">
                        <div class="c-progress__bar u-bg-success" style="width:100%;">
                            <div class="c-progress__bar u-bg-fancy" style="width: 70%">
                                <div class="c-progress__bar u-bg-info" style="width: 50%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- // .c-progress-card__item -->

                <div class="c-progress-card__item">
                    <div class="c-progress-card__label">Week 4</div>

                    <div class="c-progress-card__progress c-progress c-progress--small">
                        <div class="c-progress__bar u-bg-success" style="width:100%;">
                            <div class="c-progress__bar u-bg-fancy" style="width: 70%">
                                <div class="c-progress__bar u-bg-info" style="width: 50%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- // .c-progress-card__item -->

                <div class="c-progress-card__item">
                    <div class="c-progress-card__label">Week 5</div>

                    <div class="c-progress-card__progress c-progress c-progress--small">
                        <div class="c-progress__bar u-bg-success" style="width:100%;">
                            <div class="c-progress__bar u-bg-fancy" style="width: 70%">
                                <div class="c-progress__bar u-bg-info" style="width: 50%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- // .c-progress-card__item -->

                <div class="c-progress-card__item">
                    <div class="c-progress-card__label">Week 6</div>

                    <div class="c-progress-card__progress c-progress c-progress--small">
                        <div class="c-progress__bar u-bg-success" style="width:100%;">
                            <div class="c-progress__bar u-bg-fancy" style="width: 70%">
                                <div class="c-progress__bar u-bg-info" style="width: 50%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- // .c-progress-card__item -->

                <ul class="c-progress-card__legends">
                    <li class="u-text-mute u-text-xsmall">
                        <i class="c-progress-card__legend u-bg-fancy"></i>Progress
                    </li>
                    <li class="u-text-mute u-text-xsmall">
                        <i class="c-progress-card__legend u-bg-info"></i>Due
                    </li>
                    <li class="u-text-mute u-text-xsmall">
                        <i class="c-progress-card__legend u-bg-success"></i>OA
                    </li>
                    <li class="u-text-mute u-text-xsmall">
                        <i class="c-progress-card__legend u-bg-danger"></i>Delegated
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <span class="c-divider has-text u-mb-medium">Active Projects</span>

    <div class="row">
        <div class="col-sm-6 col-lg-6 col-xl-3">

            <div class="c-project-card u-mb-medium">
                <img class="c-project-card__img" src="{{ asset('assets/img/project-card1.jpg') }}" alt="About the image">

                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Magazine Images</h4>
                        <p class="c-project-card__info">Kinfolk  |  Last Update: 21 Dec 2016</p>
                    </div>


                    <div class="c-project-card__meta">
                        <p>4,870 USD
                            <small class="u-block u-text-mute">Budget / Salary</small>
                        </p>
                        <p>Early Dec 2017
                            <small class="u-block u-text-danger">10 Days Remaining</small>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-6 col-lg-6 col-xl-3">

            <div class="c-project-card u-mb-medium">
                <img class="c-project-card__img" src="{{ asset('assets/img/project-card2.jpg') }}" alt="About the image">

                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Design Competition 2018</h4>
                        <p class="c-project-card__info">Gourmet| Last Update: 29 Dec 2017</p>
                    </div>


                    <div class="c-project-card__meta">
                        <p>9,680 USD
                            <small class="u-block u-text-mute">Budget / Salary</small>
                        </p>
                        <p>Late January
                            <small class="u-block u-text-mute">Deadline</small>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-6 col-lg-6 col-xl-3">

            <div class="c-project-card u-mb-medium">
                <img class="c-project-card__img" src="{{ asset('assets/img/project-card3.jpg') }}" alt="About the image">

                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">New Dashboard</h4>
                        <p class="c-project-card__info">Tapdaq  |  Last Update: 28 Nov 2017</p>
                    </div>


                    <div class="c-project-card__meta">
                        <p>4,870 USD
                            <small class="u-block u-text-mute">Budget / Salary</small>
                        </p>
                        <p>Early Dec 2017
                            <small class="u-block u-text-danger">15 Days Remaining</small>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-6 col-lg-6 col-xl-3">

            <div class="c-project-card u-mb-medium">
                <img class="c-project-card__img" src="{{ asset('assets/img/project-card4.jpg') }}" alt="About the image">

                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Mobile App</h4>
                        <p class="c-project-card__info">Cofee & Co.  |  Last Update: 1 Dec 2016</p>
                    </div>


                    <div class="c-project-card__meta">
                        <p>8,760 USD
                            <small class="u-block u-text-mute">Budget / Salary</small>
                        </p>
                        <p>Early Dec 2017
                            <small class="u-block u-text-mute">6 Days Remaining</small>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- // .row -->

    <div class="row">
        <div class="col-md-6">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__head">
                    <h5 class="c-card__title">Invoicing</h5>
                    <a class="c-card__meta" href="#">View all invoices</a>
                </div>

                <table class="c-table u-border-zero">
                    <tbody>
                    <tr class="c-table__row">
                        <td class="c-table__cell u-text-mute">00450</td>
                        <td class="c-table__cell">Design Works</td>
                        <td class="c-table__cell u-text-mute">Carlson Limited</td>
                        <td class="c-table__cell u-text-right">
                            <span class="c-badge c-badge--small c-badge--danger">Delayed</span>
                        </td>
                        <td class="c-table__cell">$2,580</td>
                    </tr>

                    <tr class="c-table__row">
                        <td class="c-table__cell u-text-mute">00569</td>
                        <td class="c-table__cell">New Illustrations</td>
                        <td class="c-table__cell u-text-mute">Twitter</td>
                        <td class="c-table__cell">
                            <span class="c-badge c-badge--small c-badge--warning">Pending Invoice</span>
                        </td>
                        <td class="c-table__cell">$2,580</td>
                    </tr>

                    <tr class="c-table__row">
                        <td class="c-table__cell u-text-mute">01875</td>
                        <td class="c-table__cell">UX Study</td>
                        <td class="c-table__cell u-text-mute">Re-Research</td>
                        <td class="c-table__cell u-text-right">
                            <span class="c-badge c-badge--small c-badge--success">Paid Today</span>
                        </td>
                        <td class="c-table__cell">$2,580</td>
                    </tr>

                    <tr class="c-table__row">
                        <td class="c-table__cell u-text-mute">00369</td>
                        <td class="c-table__cell">Landing Page</td>
                        <td class="c-table__cell u-text-mute">Travelsimo</td>
                        <td class="c-table__cell u-text-right">
                            <span class="c-badge c-badge--small c-badge--secondary">Paid Today</span>
                        </td>
                        <td class="c-table__cell">$2,580</td>
                    </tr>

                    <tr class="c-table__row">
                        <td class="c-table__cell u-text-mute">00689</td>
                        <td class="c-table__cell">iOS App Design</td>
                        <td class="c-table__cell u-text-mute">Silingo</td>
                        <td class="c-table__cell u-text-right">
                            <span class="c-badge c-badge--small c-badge--secondary">Paid Today</span>
                        </td>
                        <td class="c-table__cell">$2,580</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="c-card u-mb-medium">
                <div class="c-card__head">
                    <h5 class="c-card__title">Tasks</h5>
                    <a class="c-card__meta" href="#">View all all tasks</a>
                </div>

                <div class="c-todo">
                    <input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
                    <label class="c-todo__label" for="todo1">
                        Create new prototype for the landing page
                    </label>

                    <span class="c-badge c-badge--danger c-badge--small">Due Today</span>
                </div><!-- // .c-todo -->

                <div class="c-todo">
                    <input class="c-todo__input" id="todo2" type="checkbox" name="exampe-list">
                    <label class="c-todo__label" for="todo2">
                        Add new Google Analytics code to all main files
                    </label>

                    <span class="c-badge c-badge--secondary c-badge--small">Due in 2 Days</span>
                </div><!-- // .c-todo -->

                <div class="c-todo">
                    <input class="c-todo__input" id="todo3" type="checkbox" name="exampe-list">
                    <label class="c-todo__label" for="todo3">
                        Finish Dashboard UI Kit update
                    </label>

                    <span class="c-badge c-badge--secondary c-badge--small">Due in 3 Days</span>
                </div><!-- // .c-todo -->

                <div class="c-todo is-completed">
                    <input class="c-todo__input" id="todo4" type="checkbox" name="exampe-list" checked>
                    <label class="c-todo__label" for="todo4">
                        Update parallax scroll on team page
                    </label>

                    <span class="c-badge c-badge--secondary c-badge--small">Due in 5 Days</span>
                </div><!-- // .c-todo -->

                <div class="c-todo is-completed">
                    <input class="c-todo__input" id="todo5" type="checkbox" name="exampe-list" checked>
                    <label class="c-todo__label" for="todo5">
                        Update parallax scroll on team page
                    </label>

                    <span class="c-badge c-badge--secondary c-badge--small">Due in 1 Week</span>
                </div><!-- // .c-todo -->
            </div>
        </div>
    </div><!-- // .row -->

</div><!-- // .container -->