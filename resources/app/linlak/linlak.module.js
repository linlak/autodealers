import * as angular from 'angular';
import {
    LINLAK_SERVICES_MODULE
} from './services/services.module';
import {
    LINLAK_FILTERS_MODULE
} from './filters/filters.module';
import {
    LINLAK_DIRECTIVES_MODULE
} from './directives/directives.module';
import {
    LINLAK_ANIMATIONS_MODULE
} from './animations/animations.module';
export const LINLAK_MODULE = angular.module('linlak', [
    LINLAK_SERVICES_MODULE.name,
    LINLAK_ANIMATIONS_MODULE.name,
    LINLAK_DIRECTIVES_MODULE.name,
    LINLAK_FILTERS_MODULE.name
]);
