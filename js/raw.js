(function (global, factory) {
    if (typeof define === "function" && define.amd) {
        define('main', [], factory);
    } else if (typeof exports !== "undefined") {
        factory();
    } else {
        var mod = {
            exports: {}
        };
        factory();
        global.main = mod.exports;
    }
})(this, function () {
    'use strict';

    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function");
        }
    }

    var _createClass = function () {
        function defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || false;
                descriptor.configurable = true;
                if ("value" in descriptor) descriptor.writable = true;
                Object.defineProperty(target, descriptor.key, descriptor);
            }
        }

        return function (Constructor, protoProps, staticProps) {
            if (protoProps) defineProperties(Constructor.prototype, protoProps);
            if (staticProps) defineProperties(Constructor, staticProps);
            return Constructor;
        };
    }();

    var RolexWatch = function () {
        function RolexWatch() {
            _classCallCheck(this, RolexWatch);
        }

        _createClass(RolexWatch, [{
            key: 'initLocalClocks',
            value: function initLocalClocks() {
                var date = new Date();
                var seconds = date.getSeconds();
                var minutes = date.getMinutes();
                var hours = date.getHours();

                var hands = [{
                    hand: 'hours',
                    angle: hours * 30 + minutes / 2
                }, {
                    hand: 'minutes',
                    angle: minutes * 6
                }, {
                    hand: 'seconds',
                    angle: seconds * 6
                }];

                for (var j = 0; j < hands.length; j++) {
                    var elements = document.querySelectorAll('.' + hands[j].hand);
                    for (var k = 0; k < elements.length; k++) {
                        elements[k].style.webkitTransform = 'rotateZ(' + hands[j].angle + 'deg)';
                        elements[k].style.transform = 'rotateZ(' + hands[j].angle + 'deg)';

                        if (hands[j].hand === 'minutes') {
                            elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
                        }
                    }
                }
            }
        }, {
            key: 'moveSecondHands',
            value: function moveSecondHands() {
                var containers = document.querySelectorAll('.bounce .seconds-container');
                setInterval(function () {
                    for (var i = 0; i < containers.length; i++) {
                        if (containers[i].angle === undefined) {
                            containers[i].angle = 6;
                        } else {
                            containers[i].angle += 6;
                        }
                        containers[i].style.webkitTransform = 'rotateZ(' + containers[i].angle + 'deg)';
                        containers[i].style.transform = 'rotateZ(' + containers[i].angle + 'deg)';
                    }
                }, 1000);
                for (var i = 0; i < containers.length; i++) {
                    var randomOffset = Math.floor(Math.random() * (100 - 10 + 1)) + 10;
                    containers[i].style.webkitTransitionDelay = '0.0' + randomOffset + 's';
                    containers[i].style.transitionDelay = '0.0' + randomOffset + 's';
                }
            }
        }, {
            key: 'setUpMinuteHands',
            value: function setUpMinuteHands() {
                var self = this;
                var containers = document.querySelectorAll('.minutes-container');
                var secondAngle = containers[0].getAttribute('data-second-angle');
                if (secondAngle > 0) {
                    var delay = ((360 - secondAngle) / 6 + 0.1) * 1000;
                    setTimeout(function () {
                        self.moveMinuteHands(containers);
                    }, delay);
                }
            }
        }, {
            key: 'moveMinuteHands',
            value: function moveMinuteHands(containers) {
                for (var i = 0; i < containers.length; i++) {
                    containers[i].style.webkitTransform = 'rotateZ(6deg)';
                    containers[i].style.transform = 'rotateZ(6deg)';
                }
                setInterval(function () {
                    for (var _i = 0; _i < containers.length; _i++) {
                        if (containers[_i].angle === undefined) {
                            containers[_i].angle = 12;
                        } else {
                            containers[_i].angle += 6;
                        }
                        containers[_i].style.webkitTransform = 'rotateZ(' + containers[_i].angle + 'deg)';
                        containers[_i].style.transform = 'rotateZ(' + containers[_i].angle + 'deg)';
                    }
                }, 60000);
            }
        }]);

        return RolexWatch;
    }();

    var CountDown = function () {
        function CountDown() {
            _classCallCheck(this, CountDown);
        }

        _createClass(CountDown, [{
            key: 'getTimeRemaining',
            value: function getTimeRemaining(endtime) {
                var t = Date.parse(endtime) - Date.parse(new Date());
                var seconds = Math.floor(t / 1000 % 60);
                var minutes = Math.floor(t / 1000 / 60 % 60);
                var hours = Math.floor(t / (1000 * 60 * 60) % 24);
                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                return {
                    'total': t,
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                };
            }
        }, {
            key: 'initializeClock',
            value: function initializeClock(id, endtime) {
                var _this = this;

                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.cnt_days');
                var hoursSpan = clock.querySelector('.cnt_hours');
                var minutesSpan = clock.querySelector('.cnt_minutes');
                var secondsSpan = clock.querySelector('.cnt_seconds');
                var updateClock = function updateClock() {
                    var t = _this.getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                        clearInterval(timeinterval);
                    }
                };

                updateClock();
                var timeinterval = setInterval(updateClock, 1000);
            }
        }]);

        return CountDown;
    }();

    (function () {
        var watch = new RolexWatch();
        watch.initLocalClocks();
        watch.moveSecondHands();
        watch.setUpMinuteHands();

        var countDown = new CountDown();
        var deadline = new Date(2023, 8, 12, 0, 0, 0); // "May 09, 2023 00:00:00"
        countDown.initializeClock('countdown', deadline);
    })();
});