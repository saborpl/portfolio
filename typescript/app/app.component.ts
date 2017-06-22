import { Component } from '@angular/core';
import { Platform } from 'ionic-angular';
import { StatusBar, Splashscreen } from 'ionic-native';
import { LoginPage } from '../pages/login/login';
import { ProductionPage } from '../pages/production/production';
import { PlayerPage } from '../pages/player/player';


@Component({
    template: `
  <ion-nav [root]="rootPage"></ion-nav>
  `
})
export class MyApp {
    public rootPage: any;
    /**
     * Creates an instance of MyApp.
     * 
     * @param {Platform} platform
     * 
     * @memberOf MyApp
     */
    constructor(platform: Platform) {
        this.rootPage = LoginPage;
        //this.rootPage = platform.is("mobileweb") ? ProductionPage : LoginPage;
        //console.log(platform.platforms());

        platform.ready().then(() => {
            // Okay, so the platform is ready and our plugins are available.
            // Here you can do any higher level native things you might need.
            StatusBar.hide();
            Splashscreen.hide();
        });
    }


    public cLog(type, classname, text) {
        switch (type) {
            case "log":
                console.log(classname + ": " + text)
                break;
            case "info":
                console.info(classname + ": " + text)
                break;
            case "warn":
                console.warn(classname + ": " + text)
                break;
            case "error":
                console.error(classname + ": " + text)
                break;
            case "debug":
                console.debug(classname + ": " + text)
                break;
            case "exception":
                console.exception(classname + ": " + text)
                break;
        }
    }

}
