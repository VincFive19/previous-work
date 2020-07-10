import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalEmailPage } from './modal-email.page';

describe('ModalEmailPage', () => {
  let component: ModalEmailPage;
  let fixture: ComponentFixture<ModalEmailPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalEmailPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalEmailPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
