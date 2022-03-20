# Getting Started

- Please read the INSTRUCTIONS.md first

# Code and Design Decisions

First and foremost I would like to thank you all for the time and efforts during this proccess. Thank you.

Code decisions: 

- regarding the layout: the svg heart images were not included, due to time limit. Instead, I used a circular div.
- regarding plugin: the plugin must be activated, so it will programmatically create a page called Property Listing; This page/post is created with a post meta, _side_inc, which is used later to get the correct id of the page; So it won't miss insert assets to the wrong page, in case it has the same name or title. The plugin enqueues styles and javascript in the correct route. The JS it enqueues is devided in 3 parts: fetch real estates, insert dom elements and like feature.
- regarding theme: the theme was used to insert a global header to the project, as it was demanded by the figma layout.
- regarding tests: setup - I improved the setup tests so it visits the property listing rout as well, and it checks the dom elements. I also developed a test for the like feature, it tests the like button, the change of color and verifies if the stored data matches the data clicked.
