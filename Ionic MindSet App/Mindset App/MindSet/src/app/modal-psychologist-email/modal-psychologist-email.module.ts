import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { ModalPsychologistEmailPage } from './modal-psychologist-email.page';

const routes: Routes = [
  {
    path: '',
    component: ModalPsychologistEmailPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ModalPsychologistEmailPage]
})
export class ModalPsychologistEmailPageModule {}
