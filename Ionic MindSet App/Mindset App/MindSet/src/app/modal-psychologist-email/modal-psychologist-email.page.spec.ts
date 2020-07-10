import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalPsychologistEmailPage } from './modal-psychologist-email.page';

describe('ModalPsychologistEmailPage', () => {
  let component: ModalPsychologistEmailPage;
  let fixture: ComponentFixture<ModalPsychologistEmailPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalPsychologistEmailPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalPsychologistEmailPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
