var config = {
    container: "#org_chart",

    connectors: {
        type: 'step',
        stackIndent: 10
    },
    siblingSeparation: 100,
    subTeeSeparation: 150, 
    node: {
        HTMLclass: 'projectOrg'
    }
},
        pd = {
            innerHTML: '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Ir. Suwahyu, MSc</strong></div><p class="bd-notif-body ml-1">Program Director</p></div></div>'
        },
        ce = {
            parent: pd,
            innerHTML: '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Drs. Mohamad Dahsyat, MM</strong></div><p class="bd-notif-body ml-1">Chief Engineer</p></div></div>'
        },
        ps = {
            parent: pd,
            pseudo: true
        },
        pm = {
            parent: pd,
            innerHTML: '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Jimmy Maulana, S.T, MT</strong></div><p class="bd-notif-body ml-1">Program Manager</p></div></div>'
        },
        wbs1 = {
            parent: ps,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WBS 1000: Hull & System Integration</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Ir. Adrian Zulkifli</strong></div><p class="bd-notif-body ml-1">Group Leader </p></div></div>'
        },
        wbs2 = {
            parent: ps,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WBS 2000: Propulsion & Electronical System</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Dr. Ir. Abdul Aziz, Msc</strong></div><p class="bd-notif-body ml-1">Group Leader</p></div></div>'
        },
        wp1 = {
            parent: wbs1,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 1100: Hull System</p></div>'+
                    '<div class="media p-0 mb-2"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Abid Paripurna Fuadi, S.T</strong></div><p class="bd-notif-body ml-1">Leader</p></div></div>' +
                    '<div class="media p-0 mt-1"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-top border-eng-adj-secondary-2-1"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Endarmadi Aji Prayitno, S.T, MT</strong></div><p class="bd-notif-body ml-1">Engineer Staff 1101: Naval Engineer</p></div></div>'+
                    '<div class="media p-0 mt-1"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-top border-eng-adj-secondary-2-1"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">	Heri Tri Muryanto, S.Kom</strong></div><p class="bd-notif-body ml-1">Engineer Staff 1102: Software Analyst</p></div></div>'
        },
        wp2 = {
            parent: wbs1,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 1200: Hull Structure & Performance</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Fadli Cahya Megawanto, ST</strong></div><p class="bd-notif-body ml-1">Leader </p></div></div>'
        },
        wp3 = {
            parent: wbs1,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 1300: Auxiliary & Outfitting</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Endarmadi Aji Prayitno, S.T, MT</strong></div><p class="bd-notif-body ml-1">Leader </p></div></div>'
        },
        wp4 = {
            parent: wbs1,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 1400: Control System</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Dr. Ir. Fadjar Rahino, M.T</strong></div><p class="bd-notif-body ml-1">Leader </p></div></div>'
        },
        wp5 = {
            parent: wbs2,
            stackChildren: true,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 2100: Propulsion System</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Bambang Irawan, S.T</strong></div><p class="bd-notif-body ml-1">Leader </p></div></div>'
        },
        wp6 = {
            stackChildren: true,
            parent: wbs2,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 2200: Power Generation & Electrical System</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">Ade Purwanto, ST, M.Sc</strong></div><p class="bd-notif-body ml-1">Leader</p></div></div>'
        },
        wp7 = {
            stackChildren: true,
            parent: wbs2,
            innerHTML: '<div class="container mb-1 text-white bg-eng-adj-secondary-2-1"><p class="text-center">WP 2300: Navcom & Weapon System</p></div>'+
                    '<div class="media p-0"><div class="d-flex bg-eng-adj-secondary-2-1 justify-content-center align-items-center text-center rounded-left"><img src="http://[::1]/hankam256/images/no-image.jpg" alt="" class="ml-1 my-1 rounded-circle" width="48" height="50"></div><div class="media-body bg-white border-gray"><div class="d-flex ml-1 align-items-baseline"><strong style="font-weight:bold">	Mohammad Amanta Kumala Sakti, ST, MT</strong></div><p class="bd-notif-body ml-1">Leader </p></div></div>'
        }

chart_config = [
    config,
    pd,
    ce,
    ps,
    pm,
    wbs1,
    wbs2,
    wp1,
    wp2,
    wp3,
    wp4,
    wp5,
    wp6,
    wp7
];




// Another approach, same result
// JSON approach

/*
 var chart_config = {
 chart: {
 container: "#basic-example",
 
 connectors: {
 type: 'step'
 },
 node: {
 HTMLclass: 'nodeExample1'
 }
 },
 nodeStructure: {
 text: {
 name: "Mark Hill",
 title: "Chief executive officer",
 contact: "Tel: 01 213 123 134",
 },
 image: "../headshots/2.jpg",
 children: [
 {
 text:{
 name: "Joe Linux",
 title: "Chief Technology Officer",
 },
 stackChildren: true,
 image: "../headshots/1.jpg",
 children: [
 {
 text:{
 name: "Ron Blomquist",
 title: "Chief Information Security Officer"
 },
 image: "../headshots/8.jpg"
 },
 {
 text:{
 name: "Michael Rubin",
 title: "Chief Innovation Officer",
 contact: "we@aregreat.com"
 },
 image: "../headshots/9.jpg"
 }
 ]
 },
 {
 stackChildren: true,
 text:{
 name: "Linda May",
 title: "Chief Business Officer",
 },
 image: "../headshots/5.jpg",
 children: [
 {
 text:{
 name: "Alice Lopez",
 title: "Chief Communications Officer"
 },
 image: "../headshots/7.jpg"
 },
 {
 text:{
 name: "Mary Johnson",
 title: "Chief Brand Officer"
 },
 image: "../headshots/4.jpg"
 },
 {
 text:{
 name: "Kirk Douglas",
 title: "Chief Business Development Officer"
 },
 image: "../headshots/11.jpg"
 }
 ]
 },
 {
 text:{
 name: "John Green",
 title: "Chief accounting officer",
 contact: "Tel: 01 213 123 134",
 },
 image: "../headshots/6.jpg",
 children: [
 {
 text:{
 name: "Erica Reel",
 title: "Chief Customer Officer"
 },
 link: {
 href: "http://www.google.com"
 },
 image: "../headshots/10.jpg"
 }
 ]
 }
 ]
 }
 };
 
 */