import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PlayPauseButtonItemComponent } from './play-pause-button-item.component';

describe('PlayPauseButtonItemComponent', () => {
  let component: PlayPauseButtonItemComponent;
  let fixture: ComponentFixture<PlayPauseButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PlayPauseButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PlayPauseButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
