define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            defaults: {
                count : ko.observable(1),
            },

            initialize: function (config) {
                this._super();
                this.total = config.totalInStock;

                this.currentValue = ko.computed(function () {
                    return parseInt(this.count(), 10);
                }, this);
            },

            increase: function () {
                let currentValue = this.currentValue();

                if (currentValue < this.total) {
                    this.count(currentValue + 1);
                }
            },

            decrease: function () {
                let currentValue = this.currentValue();

                if (currentValue > 0) {
                    this.count(currentValue - 1);
                }
            }
        });
    }
);
