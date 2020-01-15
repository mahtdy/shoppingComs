// $(document).ready(function() {
//
//     var map = $.sMap({
//         element: '#map',
//         presets: {
//             latlng: {
//                 lat: 36.28170,
//                 lng: 50.01085,
//             },
//             zoom: 14,
//         },
//     });
//
//     $.sMap.layers.static.build({
//         layers: {
//             base: {
//                 default: {
//                     server: 'https://map.ir/shiveh',
//                     layers: 'Shiveh:ShivehNOPOI',
//                     format: 'image/png',
//                 },
//             },
//         },
//     });
//
//     $.sMap.menu.implement();
//
//     $.sMap.locale.implement({
//         locales: ['fa', 'en'],
//     });
//
// })
//================================
$(document).ready(function() {

    var map = $.sMap({
        mode: 'test',
        element: '#map',
        presets: {
            latlng: {
                lat: 36.281801,
                lng: 50.010538,
            },
            zoom: 14,
        },
        i18n: {
            fa: {
                'custom-baselayer-default': 'پیش‎فرض',
                //  'custom-baselayer-satellite': 'ماهواره',
                // 'custom-baselayer-terrain': 'زمین',
                // 'custom-baselayer-boundries': 'مرزها',
                // 'custom-baselayer-states': 'استان‎ها',
                // 'custom-layer-management-tag': 'تگ',
                'custom-layer-management-submit-tag': 'ثبت کن',
            },            // ,
            // en: {
            //     'custom-baselayer-default': 'Default',
            //     'custom-baselayer-satellite': 'Satellite',
            //     'custom-baselayer-terrain': 'Terrain',
            //     'custom-baselayer-boundries': 'Boundries',
            //     'custom-baselayer-states': 'Provinces',
            //     'custom-layer-management-tag': 'Tag',
            //     'custom-layer-management-submit-tag': 'Submit',
            // },
            ar: {
                'custom-baselayer-default': 'الترجمه',
                'custom-baselayer-satellite': 'الترجمه',
                'custom-baselayer-terrain': 'الترجمه',
                'custom-baselayer-boundries': 'الترجمه',
                'custom-baselayer-states': 'الترجمه',
                'custom-layer-management-tag': 'الترجمه',
                'custom-layer-management-submit-tag': 'الترجمه',
            },
        },
    });

   $.sMap.logo.implement();

    $.sMap.fullscreen.implement();

   $.sMap.menu.implement();

    $.sMap.locale.implement();

    $.sMap.layers.static.build({
        layers: {
            base: {
                default: {
                    server: 'https://map.ir/shiveh',
                    layers: 'Shiveh:ShivehGSLD256',
                    format: 'image/png',
                    i18n: 'custom-baselayer-default',
                },
                satellite: {
                    server: 'https://demo.boundlessgeo.com/geoserver/ows?',
                    layers: 'ne:ne',
                    format: 'image/png',
                    i18n: 'custom-baselayer-satellite',
                },
                terrain: {
                    server: 'https://demo.boundlessgeo.com/geoserver/ows?',
                    layers: 'nasa:bluemarble',
                    format: 'image/png',
                    i18n: 'custom-baselayer-terrain',
                },
            },
            over: {
                boundries: {
                    server: 'https://korona.geog.uni-heidelberg.de/tiles/adminb/x={x}&y={y}&z={z}',
                    i18n: 'custom-baselayer-boundries',
                },
                states: {
                    server: 'https://{s}.tile.openstreetmap.se/hydda/roads_and_labels/{z}/{x}/{y}.png',
                    i18n: 'custom-baselayer-states',
                },
            },
        },
    });
    $.sMap.zoomControl.implement();

    $.sMap.userLocation.implement({
        history: true,
    });

    $.sMap.dynamicLocation.implement({
        format: 'latlng', // dms, latlng
        source: 'center', // center, mouse, click, contextmenu
    });

    $.sMap.dynamicUrl({
        marker: true,
    });

    $.sMap.contextmenu.build({
        here: true,
        distance: false,
        area: false,
        copy: false,
        share: false,
        static: true,
    });

   $.sMap.measurement();

  $.sMap.features();

    $.sMap.features.marker.create({
        before: function() {},
        after: function() {},
        name: 'test-marker',
        popup: {
            title: {
                html: 'title',
                i18n: '',
            },
            description: {
                html: 'description',
                i18n: '',
            },
            custom: 'Custom popup overwrites title and description! You can even customize click and contextmenu callback functions.',
        }
        ,
        class: 'default ltr',
        latlng: {
            lat: 36.281801,
            lng: 50.010538,
        },
        icon: {
            iconUrl: 'mapp/assets/images/marker-default-red.svg',
            iconSize: [40,40],
            iconAnchor: [20,40],
            popupAnchor: [0,-40],
        }
        ,
        popupOpen: false,
        pan: false,
        draggable: false,
        history: {},
        on: {
            click: function(){
                console.log('click callback');
            },
            contextmenu: function(){
                console.log('contextmenu callback');
            },
        },
    });

    // $.sMap.features.polygon.create({
    //     before: function() {},
    //     after: function() {},
    //     name: 'test-polygon',
    //     popup: {
    //         title: {
    //             html: '',
    //             i18n: '',
    //         },
    //         description: {
    //             html: '',
    //             i18n: '',
    //         },
    //         custom: 'Some custom popup.',
    //     },
    //     class: 'default ltr',
    //     style: styles.default.polygon,
    //     coordinates: [
    //         [35, 55],
    //         [35, 45],
    //         [30, 55],
    //     ],
    //     popupOpen: false,
    //     pan: false,
    //     measurement: false,
    //     on: {
    //         click: function(){
    //             console.log('click callback');
    //         },
    //         contextmenu: function(){
    //             console.log('contextmenu callback');
    //         },
    //     },
    // });

    // $.sMap.features.polyline.create({
    //     before: function() {},
    //     after: function() {},
    //     name: 'test-polyline',
    //     popup: {
    //         title: {
    //             html: '',
    //             i18n: '',
    //         },
    //         description: {
    //             html: '',
    //             i18n: '',
    //         },
    //         custom: 'Some custom popup.',
    //     },
    //     class: 'default ltr',
    //     style: styles.default.polyline,
    //     coordinates: [
    //         [30, 50],
    //         [40, 57],
    //     ],
    //     popupOpen: false,
    //     pan: false,
    //     measurement: false,
    //     on: {
    //         click: function(){
    //             console.log('click callback');
    //         },
    //         contextmenu: function(){
    //             console.log('contextmenu callback');
    //         },
    //     },
    // });

    $.sMap.media();

    $.sMap.editor.implement({
        renderer: 'svg',
    });

    var points = {
        "type": "FeatureCollection",
        "features": [
            // {
            //     "type": "Feature",
            //     "properties": {
            //         title: 'Test1',
            //         description: 'Desc1',
            //         icon: 'mapp/assets/images/marker-default-green.svg',
            //     },
            //     "geometry": {
            //         "type": "Point",
            //         "coordinates": [52, 32]
            //     }
            // }
            // ,
            // {
            //     "type": "Feature",
            //     "properties": {
            //         title: 'Test2',
            //         description: 'Desc2',
            //         icon: 'mapp/assets/images/marker-default-blue.svg',
            //     },
            //     "geometry": {
            //         "type": "Point",
            //         "coordinates": [53, 32]
            //     }
            // }
            // ,
            // {
            //     "type": "Feature",
            //     "properties": {
            //         title: 'Test3',
            //         description: 'Desc3',
            //         icon: 'mapp/assets/images/marker-default-red.svg',
            //     }
            //     // ,
            //     // "geometry": {
            //     //     "type": "Point",
            //     //     "coordinates": [53, 33]
            //     // }
            // }
        ]
    };

    points = $.sMap.editor.points.start({
        geoJson: points,
        modules: {
            create: true,
            drag: true,
            delete: true,
            get: true,
            editText: true,
            editIcon: true,
        },
        on: {
            click: function(feature){
                console.log('click');
                console.log(feature);
            },
            contextmenu: function(feature){
                console.log('contextmenu');
                console.log(feature);
            },
            change: function(){
                console.log($.sMap.editor.points.all());
            },
            create: function(point){
                console.log('create:');
                console.log(point);
            },
            drag: function(point){
                console.log('drag:');
                console.log(point);
            },
            delete: function(point){
                console.log('delete:');
                console.log(point);
            },
            get: function(point){
                console.log('get:');
                console.log(point);
            },
            editText: function(point){
                console.log('editText:');
                console.log(point);
            },
            editIcon: function(point){
                console.log('editIcon:');
                console.log(point);
            },
        },
        icons: [
            {
                title: 'Blue',
                class: 'marker-blue',
                url: 'mapp/assets/images/marker-default-blue.svg',
            },
            {
                title: 'Green',
                class: 'marker-green',
                url: 'mapp/assets/images/marker-default-green.svg',
            },
            {
                title: 'Red',
                class: 'marker-red',
                url: 'mapp/assets/images/marker-default-red.svg',
            },
        ],
    });

    var polylines = {
        "type": "FeatureCollection",
        "features": [
            {
                "type": "Feature",
                "properties": {
                    title: 'Test1',
                    description: 'Desc1',
                },
                "geometry": {
                    "type": "LineString",
                    "coordinates": [
                      //  [51,35],
                      //  [50,34]
                    ]
                }
            }
            ,
            {
                "type": "Feature",
                "properties": {
                    title: 'Test2',
                    description: 'Desc2',
                },
                "geometry": {
                    "type": "LineString",
                    "coordinates": [
                        [53,32],
                        [51,33]
                    ]
                }
            }
        ]
    }
    //
    // polylines = $.sMap.editor.polylines.start({
    //     geoJson: polylines,
    //     modules: {
    //         create: true,
    //         edit: true,
    //         delete: true,
    //         get: true,
    //         editText: true,
    //     },
    //     on: {
    //         click: function(feature){
    //             console.log('click');
    //             console.log(feature);
    //         },
    //         contextmenu: function(feature){
    //             console.log('contextmenu');
    //             console.log(feature);
    //         },
    //         change: function(){
    //             console.log($.sMap.editor.polylines.all());
    //         },
    //         create: function(polyline){
    //             console.log('create:');
    //             console.log(polyline);
    //         },
    //         drag: function(polyline){
    //             console.log('drag:');
    //             console.log(polyline);
    //         },
    //         delete: function(polyline){
    //             console.log('delete:');
    //             console.log(polyline);
    //         },
    //         get: function(polyline){
    //             console.log('get:');
    //             console.log(polyline);
    //         },
    //         editText: function(point){
    //             console.log('editText:');
    //             console.log(point);
    //         },
    //         edit: function(polyline){
    //             console.log('editText:');
    //             console.log(polyline);
    //         },
    //     },
    // });
    //
    // var polygons = {
    //     "type": "FeatureCollection",
    //     "features": [
    //         {
    //             "type": "Feature",
    //             "properties": {
    //                 title: 'Test1',
    //                 description: 'Desc1',
    //             },
    //             "geometry": {
    //                 "type": "Polygon",
    //                 "coordinates": [
    //                     [
    //                     //    [55,35],
    //                        // [52,34],
    //                        // [52,36],
    //                      //   [55,35]
    //                     ]
    //                 ]
    //             }
    //         },
    //         {
    //             "type": "Feature",
    //             "properties": {
    //                 title: 'Test2',
    //                 description: 'Desc2',
    //             },
    //             "geometry": {
    //                 "type": "Polygon",
    //                 "coordinates": [
    //                     [
    //                    //     [50,32],
    //                    //     [57,34],
    //                     //    [53,30],
    //                      //   [50,32]
    //                     ]
    //                 ]
    //             }
    //         }
    //     ]
    // }
    //
    // polygons = $.sMap.editor.polygons.start({
    //     geoJson: polygons,
    //     modules: {
    //         create: true,
    //         edit: true,
    //         delete: true,
    //         get: true,
    //         editText: true,
    //     },
    //     on: {
    //         click: function(feature){
    //             console.log('click');
    //             console.log(feature);
    //         },
    //         contextmenu: function(feature){
    //             console.log('contextmenu');
    //             console.log(feature);
    //         },
    //         change: function(){
    //             console.log($.sMap.editor.polygons.all());
    //         },
    //         create: function(polygon){
    //             console.log('create:');
    //             console.log(polygon);
    //         },
    //         drag: function(polygon){
    //             console.log('drag:');
    //             console.log(polygon);
    //         },
    //         delete: function(polygon){
    //             console.log('delete:');
    //             console.log(polygon);
    //         },
    //         get: function(polygon){
    //             console.log('get:');
    //             console.log(polygon);
    //         },
    //         editText: function(point){
    //             console.log('editText:');
    //             console.log(point);
    //         },
    //         edit: function(polygon){
    //             console.log('editText:');
    //             console.log(polygon);
    //         },
    //     },
    // });

    $.sMap.layers.dynamic.implement({
        format: 'image/png',
    });

    $.sMap.layers.dynamic.inspect.implement({
        popup: {
            html: function() {
                var html =
                    '<form class="form">' +
                    '<div class="form-group">' +
                    '<input name="tags" data-i18n="[placeholder]custom-layer-management-tag" />' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<button class="my-button" data-i18n="custom-layer-management-submit-tag"></button>' +
                    '</div>' +
                    '</form>';

                return html;
            },
            before: function(){},
            after: function(){
                $('.my-button').on('click', function(event){
                    event.preventDefault();
                    event.stopPropagation();

                    console.log('Send tagging ajax for: ' + $.sMap.layers.dynamic.inspect.get.get());
                });
            },
        },
    });

    // $.sMap.search.implement({
    //     types: {
    //         // address: true,
    //         // poi: false,
    //         // gnaf: false,
    //         // postcode: false,
    //         // gas: false,
    //         // water: false,
    //         // electricity: false,
    //         // mobile: false,
    //         // telephone: false,
    //         // parcel: false,
    //         // renovation: false,
    //     },
    //     // counts: {
    //     //     geocode: 10,
    //     //     poi: 10,
    //     // },
    //     history: {
    //         status: false,
    //     },
    // });

})

//====================================
// $(document).ready(function() {
//
//     var map = $.sMap({
//         element: '#map',
//         presets: {
//             latlng: {
//                 lat: 35.70,
//                 lng: 51.47,
//             },
//             zoom: 6,
//         },
//     });
//
//     $.sMap.layers.static.build({
//         layers: {
//             base: {
//                 default: {
//                     server: 'https://map.ir/shiveh',
//                     layers: 'Shiveh:ShivehNOPOI',
//                     format: 'image/png',
//                 },
//             },
//         },
//     });
//
//     $.sMap.menu.implement();
//
//     $.sMap.locale.implement({
//         locales: ['fa', 'en'],
//     });
//
// })